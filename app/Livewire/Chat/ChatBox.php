<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Notifications\MessageRead;
use App\Notifications\MessageSent;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('chat_human.layouts.app')]

class ChatBox extends Component
{
    public $selectedConversation;
    public $body = '';
    public $isCallModalVisible = false;
    public $loadedMessages;




    public $paginate_var = 10;

    protected $listeners = [
        'loadMore'
    ];


    public function getListeners()
    {

        $auth_id = auth()->user()->id;

        return [

            'loadMore',
            "echo-private:users.{$auth_id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'broadcastedNotifications'

        ];
    }

    public function broadcastedNotifications($event)
    {


        if ($event['type'] == MessageSent::class) {

            if ($event['conversation_id'] == $this->selectedConversation->id) {

                $$this->dispatch('scroll-bottom');


                $newMessage = Message::find($event['message_id']);


                #push message
                $this->loadedMessages->push($newMessage);


                #mark as read
                $newMessage->read_at = now();
                $newMessage->save();

                #broadcast
                $this->selectedConversation->getReceiver()
                    ->notify(new MessageRead($this->selectedConversation->id));
            }
        }
    }




    public function loadMore(): void
    {


        #increment
        $this->paginate_var += 10;

        #call loadMessages()

        $this->loadMessages();


        #update the chat height
        $this->dispatch('update-chat-height');
    }




    public function loadMessages()
    {

        $userId = auth()->id();
        #get count
        $count = Message::where('conversation_id', $this->selectedConversation->id)
            ->where(function ($query) use ($userId) {

                $query->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })->orWhere(function ($query) use ($userId) {

                $query->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->count();

        #skip and query
        $this->loadedMessages = Message::where('conversation_id', $this->selectedConversation->id)
            ->where(function ($query) use ($userId) {

                $query->where('sender_id', $userId)
                    ->whereNull('sender_deleted_at');
            })->orWhere(function ($query) use ($userId) {

                $query->where('receiver_id', $userId)
                    ->whereNull('receiver_deleted_at');
            })
            ->skip($count - $this->paginate_var)
            ->take($this->paginate_var)
            ->get();


        return $this->loadedMessages;
    }



    public function sendMessage()
    {
        $this->validate([
            'body' => 'required|string|max:1700',
        ]);

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedConversation->getReceiver()->id,
            'body' => $this->body,
        ]);

        // Réinitialiser le champ "body"
        $this->reset('body');

        // Événement JS pour faire défiler en bas
        $this->dispatch('scroll-bottom');

        // Ajouter le message dans les messages chargés
        $this->loadedMessages->push($createdMessage);

        // Mettre à jour le champ updated_at de la conversation
        $this->selectedConversation->touch();

        // Demander à ChatList de se rafraîchir
        $this->dispatch('refresh')->to('chat.chat-list');

        // Envoyer une notification au destinataire
        $this->selectedConversation->getReceiver()->notify(new MessageSent(
            auth()->user(),
            $createdMessage,
            $this->selectedConversation,
            $this->selectedConversation->getReceiver()->id
        ));
    }



    public function mount()
    {

        $this->loadMessages();
    }


    public function render()
    {
        return view('livewire.chat.chat-box');
    }


    public function acceptCall()
    {
        $this->isCallModalVisible = false;

        // Vérifie bien que $this->selectedConversation existe et a un ID
        $url = route('call.demo', [
            'conversation' => $this->selectedConversation->id, // <- bien passer l'ID
        ]) . '?type=' . $this->callType;

        $this->dispatchBrowserEvent('redirect-to-call', ['url' => $url]);
    }
}

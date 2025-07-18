<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('chat_human.layouts.app')]

class Chat extends Component
{

    public $query = '';
    public $type = 'all';
    public $selectedConversation;

    public function mount()
    {

        $this->selectedConversation= Conversation::findOrFail($this->query);
       /// dd($selectedConversation);


       #mark message belogning to receiver as read
       Message::where('conversation_id',$this->selectedConversation->id)
                ->where('receiver_id',auth()->id())
                ->whereNull('read_at')
                ->update(['read_at'=>now()]);


    }


    public function render()
    {
        return view('livewire.chat.chat');
    }
}

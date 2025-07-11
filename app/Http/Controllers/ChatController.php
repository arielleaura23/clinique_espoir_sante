<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Conversation;
use App\Models\Message as MessageModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Call;

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Récupère toutes les conversations de l'utilisateur
        $conversations = Conversation::where('user_one_id', $user->id)
            ->orWhere('user_two_id', $user->id)
            ->get()
            ->map(function ($conv) use ($user) {
                $other = $conv->user_one_id == $user->id ? $conv->user_two_id : $conv->user_one_id;
                $otherUser = User::find($other);
                return (object)[
                    'id' => $conv->id,
                    'other_user_id' => $otherUser->id,
                    'other_user_name' => $otherUser->name,
                ];
            });

        // Nombre de discussions
        $totalDiscussions = $conversations->count();

        // Nombre d'appels
        $totalAppels = Call::where('user_id', $user->id)->count();
        $allUsers = \App\Models\User::all();
        return view('discussions', compact('conversations', 'totalDiscussions', 'totalAppels', 'allUsers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|not_in:' . auth()->id(),
        ]);
        $user = auth()->user();
        $other_id = $request->user_id;

        // Vérifie si la conversation existe déjà
        $conv = \App\Models\Conversation::where(function ($q) use ($user, $other_id) {
            $q->where('user_one_id', $user->id)->where('user_two_id', $other_id);
        })->orWhere(function ($q) use ($user, $other_id) {
            $q->where('user_one_id', $other_id)->where('user_two_id', $user->id);
        })->first();

        if (!$conv) {
            $conv = \App\Models\Conversation::create([
                'user_one_id' => $user->id,
                'user_two_id' => $other_id,
            ]);
        }

        return response()->json(['success' => true, 'conversation_id' => $conv->id]);
    }

    public function messages($chat_id)
    {
        $messages = MessageModel::where('conversation_id', $chat_id)->get();
        return response()->json($messages);
    }

    public function message(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'from_id' => 'required|integer',
            'to_id' => 'required|integer',
            'chat_id' => 'required|integer',
        ]);

        // Enregistre le message en base
        $msg = MessageModel::create([
            'conversation_id' => $request->chat_id,
            'from_id' => $request->from_id,
            'to_id' => $request->to_id,
            'message' => $request->message,
        ]);

        event(new Message(
            $request->username,
            $request->message,
            $request->from_id,
            $request->to_id,
            $request->chat_id
        ));

        return response()->json(['status' => 'Message broadcasted']);
    }
}

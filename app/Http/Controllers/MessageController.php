<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'chat_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'user_id' => Auth::id(),
            'chat_id' => $request->chat_id,
            'content' => $request->content,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message envoyé !']);
    }
}

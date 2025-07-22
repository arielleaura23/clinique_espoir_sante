<?php



namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\CallInitiated;

class CallController extends Controller
{
    public function start(Conversation $conversation, $type)
    {
        if (!in_array($type, ['audio', 'video'])) {
            abort(404);
        }

        return view('visio_consulting', [
            'conversation' => $conversation,
            'type' => $type
        ]);
    }





    public function startCall($receiverId)
    {
        $sender = auth()->user();
        $receiver = User::findOrFail($receiverId);

        // Génère un identifiant de salle unique basé sur les deux utilisateurs
        $roomName = 'room-' . md5(min($sender->id, $receiver->id) . '-' . max($sender->id, $receiver->id));

        return view('call', compact('roomName', 'receiver'));
    }
}

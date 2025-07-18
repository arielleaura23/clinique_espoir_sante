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



}

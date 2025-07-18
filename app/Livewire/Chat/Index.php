<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('chat_human.layouts.app')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.chat.index');
    }
}

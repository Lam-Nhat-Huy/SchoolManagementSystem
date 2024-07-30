<?php

namespace App\Livewire\TrainingOfficer;

use App\Models\Chats;
use Livewire\Component;

class Chat extends Component
{
    protected $province;

    public $getAllChat;

    public function __construct()
    {
        $this->province = new Chats();
    }

    public function mount()
    {
        $this->fetchList();
    }

    public function fetchList()
    {
        $this->getAllChat = $this->province->getAllChat();
    }

    public function render()
    {
        return view('livewire.training_officer.chat');
    }
}

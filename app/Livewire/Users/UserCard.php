<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserCard extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function accept()
    {
        $this->user->is_enabled = 1;
        $this->user->save();
        session()->flash('message', 'Request accepted successfully.');
    }

    public function reject()
    {
        $this->user->is_enabled = 2;
        $this->user->save();
        session()->flash('message', 'Request rejected successfully.');
    }

    public function render()
    {
        return view('livewire.users.user-card');
    }
}

<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = '';

    public function render()
    {
        $users = User::where('is_enabled', 1)->where('name', 'like', '%' . $this->search . '%')->when($this->filter,  function ($query, $filter) {
            return $query->where('type', $filter);
        })->latest()->paginate(9);
        return view('livewire.users.user-list', [
            'users' => $users
        ]);
    }
}

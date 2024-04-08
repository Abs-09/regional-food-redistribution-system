<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Validate; 
use Illuminate\Validation\Rules;

class AddAdmin extends ModalComponent
{
    public $name = '';
    public $regno = '';
    public $address = '';
    public $email = '';
    public $type = '';
    public $password = '';
    public $password_confirmation = '';

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'regno' => ['required', 'string', 'max:255', 'unique:' . \App\Models\User::class],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . \App\Models\User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'regno' => $this->regno,
            'address' => $this->address,
            'type' => 'admin',
            'is_enabled' => 1,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Account Created.');

        return redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.users.add-admin');
    }
}

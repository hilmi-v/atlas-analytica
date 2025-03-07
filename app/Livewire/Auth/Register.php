<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

#[Layout('components.layouts.auth')]

class Register extends Component
{
    use Toast;
    public $username;
    public $email;
    public $password;
    public $passwordConfirm;

    public function register()
    {
        $credential = $this->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $user = User::create($credential);

        event(new Registered($user));
        Auth::login($user);
        $this->success('Registered successfully', redirectTo: "/profile");

    }
    public function render()
    {

        return view('livewire.auth.register');
    }
}

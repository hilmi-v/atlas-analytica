<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    use Toast;
    public $email;
    public $password;
    public $remember;

    public function login()
    {
        $credential = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential, $this->remember)) {
            if (Auth::user()->role == 'user') {
                return $this->redirect('/', true);
            } else {
                return $this->redirect('/dashboard', true);
            }
        } else {
            $this->addError('email', 'Invalid credentials');
            $this->reset('password');
        }


    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}

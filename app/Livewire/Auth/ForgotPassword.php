<?php

namespace App\Livewire\Auth;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Password;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    use Toast;
    public $email;
    public function forgotPassword()
    {
        $credentials = $this->validate([
            'email' => 'required|email'
        ]);
        $status = Password::sendResetLink(
            $credentials
        );
        return $status === Password::ResetLinkSent
            ? $this->success(__($status))
            : $this->error(__($status));
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}

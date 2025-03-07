<?php

namespace App\Livewire\Auth;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.auth')]
class EmailNotice extends Component
{
    use Toast;
    public function resend()
    {
        try {
            redirect()->route('verification.send');
        } finally {
            $this->success('Verification link sent!');
        }

    }
    public function render()
    {
        return view('livewire.auth.email-notice');
    }
}

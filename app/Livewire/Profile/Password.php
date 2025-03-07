<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mary\Traits\Toast;

class Password extends Component
{
    use Toast;
    public $currentPassword;
    public $newPassword;
    public $repeatNewPassword;

    public function update()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'repeatNewPassword' => 'required|same:newPassword'
        ]);

        if (Hash::check($this->currentPassword, auth()->user()->password)) {
            auth()->user()->update(['password' => bcrypt($this->newPassword)]);
            $this->success('Password updated successfully.');
            $this->reset();
        } else {
            $this->addError('currentPassword', 'Current password is incorrect.');
            $this->reset();
        }

    }
    public function render()
    {
        return view('livewire.profile.password');
    }
}

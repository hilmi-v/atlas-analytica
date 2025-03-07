<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Mary\Traits\Toast;

class Account extends Component
{
    use WithFileUploads;
    use Toast;
    public $username;
    public $about_me;
    public $avatar;
    public $newAvatar;
    public function cancel()
    {
        $this->reset();
        $this->reset('newAvatar');
    }

    public function update()
    {
        $user = auth()->user();
        $this->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'about_me' => 'nullable',
            'newAvatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $user->username = $this->username;
        $user->about_me = $this->about_me;
        if ($this->newAvatar) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $this->newAvatar->store('avatar');
        }
        $user->save();
        $this->success('Account updated successfully.');
    }

    public function render()
    {
        $user = auth()->user();
        $this->username = $user->username;
        $this->about_me = $user->about_me;
        $this->avatar = $user->avatar;
        return view('livewire.profile.account');
    }
}

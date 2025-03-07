<?php

namespace App\Livewire\Homepage;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.home')]
class UserDetail extends Component
{
    use WithPagination;
    public $username;
    public function mount($username)
    {
        $this->username = $username;
    }
    public function render()
    {
        $user = User::where('username', $this->username)->with('reviews', 'reviews.book')->first();
        return view('livewire.homepage.user-detail', ['user' => $user]);
    }
}

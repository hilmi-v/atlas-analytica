<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Review extends Component
{
    public function render()
    {
        $reviews = auth()->user()->reviews()->with('book', 'user')->get();
        return view('livewire.profile.review', ['reviews' => $reviews]);
    }
}

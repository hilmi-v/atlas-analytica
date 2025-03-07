<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Collection;

class Welcome extends Component
{
    use Toast;


    public function render()
    {
        $totalUser = User::all()->count();
        $totalBook = Book::all()->count();
        $totalCategory = Category::all()->count();
        $totalReview = Review::all()->count();
        return view('livewire.welcome', compact('totalUser', 'totalBook', 'totalCategory', 'totalReview'));
    }
}

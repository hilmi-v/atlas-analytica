<?php

namespace App\Livewire\Homepage;

use App\Models\Book;
use App\Models\Review;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.home')]
class Index extends Component
{
    public function render()
    {
        $books = Book::with('categories')->latest()->take(10)->get();
        $reviews = Review::with('user', 'book')->latest()->take(6)->get();
        return view('livewire.homepage.index', ['books' => $books, 'reviews' => $reviews]);
    }
}

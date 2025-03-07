<?php

namespace App\Livewire\Homepage;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.home')]
class BookDetail extends Component
{
    public bool $createModal = false;
    public $slug;
    public $rating;
    public $review;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function createReview()
    {
        $this->validate([
            'rating' => 'required|numeric|min:1|max:100',
            'review' => 'nullable'
        ]);

        $book = Book::where('slug', $this->slug)->first();
        $book->reviews()->updateOrCreate([
            'user_id' => Auth::user()->id,

        ], [
            'rating' => $this->rating,
            'review' => $this->review,
        ]);
        $this->createModal = false;
    }

    public function render()
    {
        $book = Book::where('slug', $this->slug)->with('categories')->first();
        $reviews = $book->reviews()->with('user')->where('user_id', '!=', Auth::user()->id)->paginate(6);
        $userReview = $book->reviews()->with('user')->where('user_id', Auth::user()->id)->first();
        $this->rating = $userReview ? $userReview->rating : $this->rating;
        $this->review = $userReview ? $userReview->review : $this->review;
        return view('livewire.homepage.book-detail', ['book' => $book, 'reviews' => $reviews, 'userReview' => $userReview]);
    }
}

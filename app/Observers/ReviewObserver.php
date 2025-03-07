<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        $this->updateBookRating($review->book_id);
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review): void
    {
        $this->updateBookRating($review->book_id);
    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        $this->updateBookRating($review->book_id);

    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        //
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        //
    }
    private function updateBookRating($bookId)
    {
        $book = Book::find($bookId);
        if ($book) {
            $averageRating = Review::where('book_id', $bookId)->avg('rating');
            $book->update(['total_rating' => $averageRating]);
        }
    }
}

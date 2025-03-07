<?php

namespace App\Livewire\Admin\Review;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'font-bold text-black dark:text-white w-7'],
            ['key' => 'user.username', 'label' => 'Username'],
            ['key' => 'rating', 'label' => 'Rating'],
            ['key' => 'review', 'label' => 'Review'],
        ];
    }
    public function render()
    {
        $reviews = \App\Models\Review::paginate(10);
        return view('livewire.admin.review.index', [
            'reviews' => $reviews,
            'headers' => $this->headers()
        ]);
    }
}

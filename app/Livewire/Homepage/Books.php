<?php

namespace App\Livewire\Homepage;

use App\Models\Book;
use Illuminate\Foundation\Console\InteractsWithComposerPackages;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('components.layouts.home')]
class Books extends Component
{
    use WithPagination;
    public bool $drawer = false;
    public string $search = '';
    public array $selectedCategories = [];

    public function render()
    {
        $books = Book::with('categories')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('author', 'like', "%{$this->search}%")
                    ->orWhere('publisher', 'like', "%{$this->search}%");
            })
            ->when(count($this->selectedCategories) > 0, function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->paginate(40);
        $categories = Category::all();
        return view('livewire.homepage.books', ['categories' => $categories, 'books' => $books]);
    }
}

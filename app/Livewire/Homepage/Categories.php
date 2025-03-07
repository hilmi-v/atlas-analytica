<?php

namespace App\Livewire\Homepage;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.home')]
class Categories extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $categories = Category::withCount('books')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->paginate(16);
        return view('livewire.homepage.categories', compact('categories'));
    }
}

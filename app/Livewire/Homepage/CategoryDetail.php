<?php

namespace App\Livewire\Homepage;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.home')]
class CategoryDetail extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $category = Category::where('slug', $this->slug)
            ->withCount('books')
            ->first();
        $books = $category->books()->with('categories')->paginate(16);
        return view('livewire.homepage.category-detail', [
            'category' => $category,
            'books' => $books
        ]);
    }
}

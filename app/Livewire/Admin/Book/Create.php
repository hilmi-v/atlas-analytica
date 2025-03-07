<?php

namespace App\Livewire\Admin\Book;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Create extends Component
{
    use WithFileUploads;
    use Toast;
    public $title;
    public $slug;
    public $author;
    public $published_at;
    public $published_by;
    public $language;
    public $description;
    public $pages;
    public $cover;
    public $selectedCategories = [];
    public function clearCover()
    {
        $this->cover = null;
    }

    public function store()
    {
        $this->slug = str()->slug($this->title . '-' . $this->author);
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug',
            'author' => 'required',
            'published_at' => 'required|numeric',
            'published_by' => 'required',
            'language' => 'required',
            'description' => 'required',
            'pages' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'selectedCategories' => 'required|array|min:1'
        ]);


        $book = Book::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => $this->author,
            'published_at' => $this->published_at,
            'published_by' => $this->published_by,
            'language' => $this->language,
            'description' => $this->description,
            'pages' => $this->pages,
            'cover' => $this->cover->store('images'),
        ]);
        $book->categories()->attach($this->selectedCategories);
        $this->success('Book created successfully', redirectTo: "/admin/books");
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.book.create', ['categories' => $categories]);
    }
}

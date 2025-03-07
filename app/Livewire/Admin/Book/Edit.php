<?php

namespace App\Livewire\Admin\Book;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Mary\Traits\Toast;

class Edit extends Component
{
    public $id;
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
    public $newCover;
    public $selectedCategories = [];
    public function mount($id)
    {
        $book = Book::find($id);
        $this->id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->published_by = $book->published_by;
        $this->published_at = $book->published_at;
        $this->language = $book->language;
        $this->description = $book->description;
        $this->pages = $book->pages;
        $this->cover = $book->cover;
        $this->selectedCategories = $book->categories->pluck('id')->toArray();
    }

    public function clearCover()
    {
        $this->newCover = null;
    }

    public function update()
    {

        $this->slug = str()->slug($this->title . '-' . $this->author);
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug,' . $this->id,
            'author' => 'required',
            'published_at' => 'required|numeric',
            'published_by' => 'required',
            'language' => 'required',
            'description' => 'required',
            'pages' => 'required',
            'newCover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'selectedCategories' => 'required|array|min:1'
        ]);


        $book = Book::find($this->id);
        $book->title = $this->title;
        $book->slug = $this->slug;
        $book->author = $this->author;
        $book->published_at = $this->published_at;
        $book->published_by = $this->published_by;
        $book->language = $this->language;
        $book->description = $this->description;
        $book->pages = $this->pages;
        if ($this->newCover) {
            $book->cover = $this->newCover->store('images');
        }
        $book->save();
        $book->categories()->sync($this->selectedCategories);
        $this->success('Book updated successfully', redirectTo: "/admin/books");
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.book.edit', [
            'categories' => $categories
        ]);
    }
}

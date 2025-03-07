<?php

namespace App\Livewire\Admin\Book;

use App\Models\Book;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    use Toast;
    public string $search = '';
    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];

    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'font-bold text-black dark:text-white w-7'],
            ['key' => 'title', 'label' => 'Title'],
            ['key' => 'author', 'label' => 'author'],
            ['key' => 'published_by', 'label' => 'publisher'],
        ];
    }

    public function books()
    {

        return Book::orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->when($this->search, fn($query) => $query
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('publisher', 'like', '%' . $this->search . '%'))
            ->paginate(5);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        Storage::delete($book->cover);
        $book->delete();
        $this->success('Book deleted successfully');
    }


    public function render()
    {
        return view('livewire.admin.book.index', [
            'books' => $this->books(),
            'headers' => $this->headers()
        ]);
    }
}

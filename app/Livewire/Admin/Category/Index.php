<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    use WithPagination;
    use Toast;
    public string $search = '';
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'font-bold text-black dark:text-white w-7'],
            ['key' => 'name', 'label' => 'Name'],
        ];
    }

    public function categories()
    {

        return Category::orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->when($this->search, fn($query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(5);
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        $this->success('Category deleted successfully');
    }
    public function render()
    {
        return view('livewire.admin.category.index', [
            'categories' => $this->categories(),
            'headers' => $this->headers()
        ]);
    }
}

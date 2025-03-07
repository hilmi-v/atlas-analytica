<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;
    public $name;
    public $slug;

    public function store()
    {
        $this->slug = str()->slug($this->name);
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ]);


        Category::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->success('Category created successfully', redirectTo: "/admin/categories");

    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}

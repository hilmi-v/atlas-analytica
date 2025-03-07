<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;
    public $id;
    public $name;
    public $slug;
    public function mount($id)
    {
        $category = Category::find($id);
        $this->id = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->slug = str()->slug($this->name);
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->id
        ]);

        Category::find($this->id)->update([
            'name' => $this->name,
            'slug' => $this->slug
        ]);
        $this->success('Category updated successfully', redirectTo: "/admin/categories");
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}

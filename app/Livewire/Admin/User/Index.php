<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'font-bold text-black dark:text-white w-7'],
            ['key' => 'username', 'label' => 'Username'],
            ['key' => 'role', 'label' => 'Role'],
        ];
    }
    public function render()
    {
        $users = User::paginate(10);
        return view(
            'livewire.admin.user.index',
            [
                'users' => $users,
                'headers' => $this->headers()
            ]
        );
    }
}

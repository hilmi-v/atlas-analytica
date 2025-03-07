<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.home')]
class Index extends Component
{
    public string $selectedTab = 'account';
    public function render()
    {
        return view('livewire.profile.index');
    }
}

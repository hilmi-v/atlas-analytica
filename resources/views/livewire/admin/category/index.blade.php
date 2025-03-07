<div>
    <div>
        <x-header title="Category" separator progress-indicator>
            <x-slot:actions>
                <x-input placeholder="Search..." wire:model.live.debounce="search" clearable
                    icon="o-magnifying-glass" />
            </x-slot:actions>
        </x-header>
    </div>
    <x-button label="create" class="mb-3 btn-outline btn-primary" link="/admin/categories/create" />
    <x-card>
        <x-table :headers=" $headers" :rows="$categories" :sort-by="$sortBy" with-pagination show-empty-text>

            @scope('cell_id', $category, $categories)
            {{ $categories->firstItem() + $loop->index}}
            @endscope
            @scope('actions', $category)
            <div class="flex mb-2 space-x-2">
                <x-button class="btn-warning btn-sm" label="edit" link="/admin/categories/{{ $category->id }}/edit" />
                <x-button class="btn-error btn-sm" label="delete" wire:click="delete({{ $category->id }})" spinner
                    wire:confirm='delete this category' />
            </div>
            @endscope
        </x-table>
    </x-card>

</div>
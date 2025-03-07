<div>
    <x-header title="Book" separator progress-indicator>
        <x-slot:actions>
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:actions>
    </x-header>
    <x-button label="create" class="mb-3 btn-outline btn-primary" link="/admin/books/create" />
    <x-card>
        <x-table :headers="$headers" :rows="$books" :sort-by="$sortBy" with-pagination show-empty-text>

            @scope('cell_id', $book, $books)
            {{ $books->firstItem() + $loop->index}}
            @endscope
            @scope('actions', $book)
            <div class="flex mb-2 space-x-2">
                <x-button class="btn-warning btn-sm" label="edit" link="/admin/books/{{ $book->id }}/edit" />
                <x-button class="btn-error btn-sm" label="delete" wire:click="delete({{ $book->id }})" spinner
                    wire:confirm='delete this book' />
            </div>
            @endscope
        </x-table>
    </x-card>
</div>
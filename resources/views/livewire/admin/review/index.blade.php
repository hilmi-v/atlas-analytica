<div>
    <x-header title="Review" separator progress-indicator>
    </x-header>
    <x-card>
        <x-table :headers="$headers" :rows="$reviews" with-pagination show-empty-text>

            @scope('cell_id', $review, $reviews)
            {{ $reviews->firstItem() + $loop->index}}
            @endscope


            {{--@scope('actions', $book)
            <div class="flex mb-2 space-x-2">
                <x-button class="btn-warning btn-sm" label="edit" link="/admin/books/{{ $book->id }}/edit" />
                <x-button class="btn-error btn-sm" label="delete" wire:click="delete({{ $book->id }})" spinner
                    wire:confirm='delete this book' />
            </div>
            @endscope --}}
        </x-table>
    </x-card>
</div>
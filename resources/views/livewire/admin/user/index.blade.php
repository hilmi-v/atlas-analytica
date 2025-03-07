<div>
    <x-header title="Users" separator progress-indicator>
    </x-header>
    <x-card>
        <x-table :headers="$headers" :rows="$users" with-pagination show-empty-text>

            @scope('cell_id', $user, $users)
            {{ $users->firstItem() + $loop->index}}
            @endscope
            @scope('cell_username', $user)
            <x-list-item :item="$user" value="username" sub-value="email" no-separator no-hover
                class="-mx-2 !-my-2 rounded">
                <x-slot:avatar>
                    @if ($user->avatar)
                    <x-button class=" btn-circle">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/'. $user->avatar) }}" alt="avatar">
                    </x-button>
                    @else
                    <x-button icon="o-user" class="btn-circle btn-outline btn-sm" />
                    @endif
                </x-slot:avatar>

            </x-list-item>
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
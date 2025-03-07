<div>
    <x-header title="Books" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>
    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input label="Search" class="mb-2" placeholder="Search title, author or publisher" clearable
            wire:model.live.debounce="search" icon="o-magnifying-glass" />
        <x-choices-offline label="Categories" wire:model.live.debounce="selectedCategories" :options="$categories"
            placeholder="Category" searchable />
        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>
    <div class="flex flex-wrap items-center justify-center w-full max-w-screen-xl gap-3 mx-auto">
        @if ($books->count() > 0)
        @foreach ($books as $book)
        <x-book-card-3 wire:key="{{ $book->id }}" :book="$book" />
        @endforeach
        @else
        <p class="text-3xl font-bold text-center">No books found</p>
        @endif

    </div>
</div>
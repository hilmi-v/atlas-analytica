<div>
    <x-header title="Categories" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
    </x-header>
    <div class="grid max-w-screen-xl grid-cols-4 gap-4 mx-auto">
        @foreach ($categories as $category)
        <div wire:key="{{ $category->id }}"
            class="cursor-pointer p-4 text-center text-white transition-all rounded-lg shadow bg-primary dark:hover:bg-white hover:bg-gray-50 hover:text-primary hover:scale-[1.03]">
            <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
        </div>
        @endforeach
    </div>
</div>
<div>
    <div>
        <x-header title="Create Book" subtitle="add new book here" separator progress-indicator>
        </x-header>
    </div>
    <x-button label="back" class="mb-3 btn-outline " link="/admin/books/" />
    <x-form wire:submit="store">

        <div class="grid grid-cols-2 gap-3">
            <span>
                <x-input label="title" wire:model='title' required> </x-input>
                @error('slug')
                <small class="text-red-500">
                    {{ $message }}
                </small>
                @enderror
            </span>
            <x-input label="author" wire:model='author' required> </x-input>
            <x-input label="publisher" wire:model='published_by' required> </x-input>
            <x-input label="realase year" wire:model='published_at' required type="number"> </x-input>
            <x-input label="language" wire:model='language' required> </x-input>
            <x-input label="page total" wire:model='pages' required> </x-input>
            <div>
                <x-file wire:model="cover" accept="image/png, image/jpeg" label="book cover" class="w-full">
                </x-file>
                @if ($cover !== null)
                <div class="flex gap-2">
                    <x-button wire:click='clearCover' class="btn-error btn-sm btn-outline">X</x-button>
                    <img src="{{ $cover->temporaryUrl()  }}" class="h-40 mt-3 rounded-lg" />
                </div>
                @endif
            </div>
            <x-choices-offline label="Categories" wire:model="selectedCategories" :options="$categories"
                placeholder="Search ..." searchable />
            <span class="col-span-2">
                <x-textarea label="description" wire:model="description" placeholder="books description" required
                    rows="5" />
            </span>
        </div>

        <x-button label="create" class="btn-outline btn-success" spiner="store" type="submit"></x-button>
    </x-form>
</div>
<div>
    <div>
        <x-header title="Create Category" subtitle="create new category here" separator progress-indicator>
        </x-header>
    </div>
    <x-button label="back" class="mb-3 btn-outline " link="/admin/categories/" />
    <x-form wire:submit="store">
        <x-input label="name" wire:model='name'> </x-input>
        @error('slug')
        <small class="text-red-500">
            {{ $message }}
        </small>
        @enderror

        <x-button label="create" class="btn-outline btn-success" spiner="store" type="submit"></x-button>
    </x-form>
</div>
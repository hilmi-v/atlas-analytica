<div>
    <div>
        <x-header title="Edit Category" subtitle="create new category here" separator progress-indicator>
        </x-header>
    </div>
    <x-button label="back" class="mb-3 btn-outline " link="/admin/categories/" />
    <x-form wire:submit="update">
        <x-input label="name" wire:model='name'> </x-input>
        @error('slug')
        <small class="text-red-500">
            {{ $message }}
        </small>
        @enderror

        <x-button label="Update" class="btn-outline btn-warning" spiner="update" type="submit"></x-button>
    </x-form>
</div>
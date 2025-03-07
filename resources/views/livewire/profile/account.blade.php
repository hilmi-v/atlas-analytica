<div>
    <x-header title="Account" separator progress-indicator></x-header>
    <x-form class="grid gap-2">
        <span class="flex items-center justify-center mb-7">
            <x-file wire:model="newAvatar" accept="image/png" crop-after-change>
                @if ($newAvatar)
                <img src="{{ $newAvatar->temporaryUrl() }}" class="w-40 h-40 rounded-full" />
                @else
                <img src="{{ $avatar ? asset('storage/'.$avatar):'https://placehold.co/400' }}"
                    class="w-40 h-40 rounded-full" />
                @endif
            </x-file>
        </span>

        <x-input label="Username :" required wire:model="username" />
        <span class="">
            <x-textarea label="about me :" wire:model="about" required rows="2" wire:model="about_me" />
        </span>
        <div class="flex justify-end gap-5 mx-3">
            <x-button class="" label="cancel" wire:click='cancel' spinner="cancel" />
            <x-button class="btn-success" label="Save" wire:click='update' spinner="update" />
        </div>
    </x-form>
    <x-button class="text-white btn-error" label="logout" link="{{ route('logout') }}" icon="o-power" />
</div>

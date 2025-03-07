<div>
    <x-tabs wire:model="selectedTab">
        <x-tab name="account" label="Account" icon="o-users">
            @livewire('profile.account')
        </x-tab>
        <x-tab name="review" label="Review" icon="o-pencil">
            @livewire('profile.review')
        </x-tab>
        <x-tab name="password" label="Password" icon="o-lock-closed">
            @livewire('profile.password')
        </x-tab>

    </x-tabs>
</div>

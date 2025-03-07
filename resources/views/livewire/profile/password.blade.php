<div>
    <x-header title="Password" separator progress-indicator></x-header>
    <x-form class="lg:max-w-xl" wire:submit="update">
        <x-password label="Current Password" right wire:model="currentPassword" icon="o-lock-closed" required />
        <x-password label="New Password" right wire:model="newPassword" icon="o-lock-closed" required />
        <x-password label="Confirm Password" right wire:model="repeatNewPassword" icon="o-lock-closed" required />
        <x-button class="btn-success" label="save" type="submit" spinner="update" />
    </x-form>
</div>
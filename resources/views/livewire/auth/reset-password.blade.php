<div class="flex flex-col items-center justify-center w-full">
    <p class="text-4xl font-bold text-white">Reset Password</p>
    <x-form wire:submit="resetPassword" class="w-4/5 mt-3 space-y-3">
        <x-input label="Email" placeholder="Your name" icon="o-user" wire:model="email" required type='email' />
        <x-password label="Password" right wire:model="password" icon="o-lock-closed" required />
        <x-password label="Repeat Password" right wire:model="password_confirmation" icon="o-lock-closed" required />
        <x-button type="submit" spinner="resetPassword" label="Reset password" />
    </x-form>
</div>
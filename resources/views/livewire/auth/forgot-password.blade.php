<div class="flex flex-col items-center justify-center w-full">
    <p class="text-4xl font-bold text-white">Reset Password</p>
    <x-form wire:submit="forgotPassword" class="w-4/5 mt-3 space-y-3">
        <x-input label="Email" placeholder="Your name" icon="o-user" wire:model="email" required type='email' />
        <x-button type="submit" spinner="forgotPassword" label="send reset" />
    </x-form>
</div>
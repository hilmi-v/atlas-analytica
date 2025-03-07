<div class="flex flex-col items-center justify-center w-full">
    <p class="text-2xl font-bold text-white text-center mb-3">please check your email for verification. </p>
    <x-form wire:submit='resend'>
        <x-button type='submit' label="Resend email verification" spinner='resend' />
    </x-form>
</div>
<div class="flex flex-col items-center justify-center w-full">
    <p class="text-4xl font-bold text-white">Register</p>
    <x-form wire:submit="register" class="w-4/5 mt-3 space-y-2">
        <x-input label="Username" placeholder="Username" wire:model="username" required />
        <x-input label="Email" placeholder="Your email" wire:model="email" required type="email" />
        <x-password label="Password" right wire:model="password" required placeholder="password" />
        <x-password label="Repeat password" right wire:model="passwordConfirm" required placeholder="Repeat password" />
        <p>Already have an account? <a href="{{ route('login') }}" wire:navigate
                class="text-blue-600 hover:underline">Login</a></p>
        <x-button type="submit" spinner="register" label="Register" />
    </x-form>
</div>

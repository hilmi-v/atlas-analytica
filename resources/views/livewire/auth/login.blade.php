<div class="flex flex-col items-center justify-center w-full">
    <p class="text-4xl font-bold text-white">Login</p>
    <x-form wire:submit="login" class="w-4/5 mt-3 space-y-3">
        <x-input label="Email" placeholder="Your name" icon="o-user" wire:model="email" required />
        <x-password label="Password" right wire:model="password" icon="o-lock-closed" required />
        <x-checkbox label="Remember me" wire:model="remember" />
        <p>Don't have an account? <a href="{{ route('register') }}" wire:navigate
                class="text-blue-600 hover:underline">Register</a></p>
        <x-button type="submit" spinner="login" label="Login" />
    </x-form>
</div>

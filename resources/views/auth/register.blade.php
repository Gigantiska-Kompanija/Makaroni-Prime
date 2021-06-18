<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <x-input inputFor="name" required >{{ __('Name') }}</x-input>

            <!-- Email Address -->
            <x-input inputFor="email" type="email" required >{{ __('Email') }}</x-input>

            <!-- Password -->
            <x-input inputFor="password" type="password" required autocomplete="current-password" >
                {{ __('Password') }}
            </x-input>

            <!-- Confirm Password -->
            <x-input inputFor="password_confirmation" type="password" required >{{ __('Confirm Password') }}</x-input>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button class="btn btn-warning ml-4">
                    <i class="fas fa-sign-in-alt"></i>
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

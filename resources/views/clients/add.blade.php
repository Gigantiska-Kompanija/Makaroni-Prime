<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add client') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <x-input inputFor="firstName" required>{{ __('First name') }}</x-input>
        <x-input inputFor="lastName" required>{{ __('Last name') }}</x-input>
        <x-input inputFor="registerDate" required>{{ __('Register date') }}</x-input>
        <x-input inputFor="email" required>{{ __('Email') }}</x-input>
        <x-input inputFor="password" required>{{ __('Password') }}</x-input>
        <x-input inputFor="phoneNumber" required>{{ __('Phone number') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

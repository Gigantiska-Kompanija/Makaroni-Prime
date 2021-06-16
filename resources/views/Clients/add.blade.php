<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add client
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <x-input inputFor="firstName" required>First name</x-input>
        <x-input inputFor="lastName" required>Last name</x-input>
        <x-input inputFor="registerDate" required>Register date</x-input>
        <x-input inputFor="email" required>Email</x-input>
        <x-input inputFor="password" required>Password</x-input>
        <x-input inputFor="phoneNumber" required>Phone number</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

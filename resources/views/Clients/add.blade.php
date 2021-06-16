<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add client
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\ClientController::class, 'store']) }}">
        @csrf

        <x-input inputFor="firstName" :errors="$errors" required>First name</x-input>
        <x-input inputFor="lastName" :errors="$errors" required>Last name</x-input>
        <x-input inputFor="registerDate" :errors="$errors" required>Register date</x-input>
        <x-input inputFor="email" :errors="$errors" required>Email</x-input>
        <x-input inputFor="password" :errors="$errors" required>Password</x-input>
        <x-input inputFor="phoneNumber" :errors="$errors" required>Phone number</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

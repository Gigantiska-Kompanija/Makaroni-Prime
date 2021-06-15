<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit client {{ $id }}
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\ClientController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-dark">
                Delete
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\ClientController::class, 'update'], $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="firstName" :errors="$errors" required>First name</x-input>
        <x-input inputFor="lastName" :errors="$errors" required>Last name</x-input>
        <x-input inputFor="email" :errors="$errors" required>Email</x-input>
        <x-input inputFor="password" :errors="$errors" required>Password</x-input>
        <x-input inputFor="phoneNumber" :errors="$errors" required>Phone number</x-input>

        <x-submit-btn>Save</x-submit-btn>
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit client {{ $id }}
        </h2>
        <form method="POST" action="{{ route('clients.destroy', $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('clients.update', $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="firstName" required>First name</x-input>
        <x-input inputFor="lastName" required>Last name</x-input>
        <x-input inputFor="email" required>Email</x-input>
        <x-input inputFor="password" required>Password</x-input>
        <x-input inputFor="phoneNumber" required>Phone number</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add division
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\DivisionController::class, 'store']) }}">
        @csrf

        <x-input inputFor="name" :errors="$errors" required>Name</x-input>
        <x-input inputFor="location" :errors="$errors" required>Location</x-input>
        <x-input inputFor="isOperating" :errors="$errors" required>Is operating</x-input>

        <x-submit-btn>Create</x-submit-btn>
    </form>
</x-app-layout>

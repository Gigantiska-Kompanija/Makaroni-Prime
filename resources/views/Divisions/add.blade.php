<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add division
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('divisions.store') }}">
        @csrf

        <x-input inputFor="name" required>Name</x-input>
        <x-input inputFor="location" required>Location</x-input>
        <x-input inputFor="isOperating" required>Is operating</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

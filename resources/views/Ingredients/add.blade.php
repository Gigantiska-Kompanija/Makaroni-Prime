<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add ingredient
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        <x-input inputFor="name" required>Name</x-input>
        <x-input inputFor="price" type="number" required>Price</x-input>
        <x-input inputFor="quantity" type="number" required>Quantity</x-input>
        <x-input inputFor="minimum" type="number" required>Minimum</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Makarons
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('makaroni.store') }}">
        @csrf

        <x-input inputFor="name" required>Name</x-input>
        <x-input inputFor="quantity" required>Quantity</x-input>
        <x-input inputFor="price" required>Price</x-input>
        <x-input inputFor="shape" required>Shape</x-input>
        <x-input inputFor="color" required>Color</x-input>
        <x-input inputFor="length" required>Length</x-input>
        <x-input inputFor="popularity" required>Popularity</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

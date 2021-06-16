<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Makarons
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\MakaroniController::class, 'store']) }}">
        @csrf

        <x-input inputFor="name" :errors="$errors" required>Name</x-input>
        <x-input inputFor="quantity" :errors="$errors" required>Quantity</x-input>
        <x-input inputFor="price" :errors="$errors" required>Price</x-input>
        <x-input inputFor="shape" :errors="$errors" required>Shape</x-input>
        <x-input inputFor="color" :errors="$errors" required>Color</x-input>
        <x-input inputFor="length" :errors="$errors" required>Length</x-input>
        <x-input inputFor="popularity" :errors="$errors" required>Popularity</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

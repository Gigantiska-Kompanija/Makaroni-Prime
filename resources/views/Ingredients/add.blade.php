<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add ingredient
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\IngredientController::class, 'store']) }}">
        @csrf

        <x-input inputFor="name" :errors="$errors" required>Name</x-input>
        <x-input inputFor="price" :errors="$errors" required>Price</x-input>
        <x-input inputFor="quantity" :errors="$errors" required>Quantity</x-input>
        <x-input inputFor="minimum" :errors="$errors" required>Minimum</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

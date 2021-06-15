<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Makarons
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\CartController::class, 'storeOrder']) }}">
        @csrf

        <x-input inputFor="cardNr" :errors="$errors" required>Credit card number</x-input>
        <x-input inputFor="expDate" :errors="$errors" required>Expiration date</x-input>
        <x-input inputFor="code" :errors="$errors" required>Security code</x-input>

        <x-submit-btn>Order</x-submit-btn>
    </form>
</x-app-layout>

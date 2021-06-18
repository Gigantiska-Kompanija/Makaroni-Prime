<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('form.storeOrder') }}">
        @csrf

        <x-input inputFor="cardNr" required>Credit card number</x-input>
        <x-input inputFor="expDate" required>Expiration date</x-input>
        <x-input inputFor="code" required>Security code</x-input>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-warning">
                <i class="fas fa-money-bill"></i>
            </button>
        </div>
    </form>
</x-app-layout>

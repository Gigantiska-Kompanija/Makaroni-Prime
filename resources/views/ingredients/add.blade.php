<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add ingredient') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        <x-input inputFor="name" required>{{ __('Name') }}</x-input>
        <x-input inputFor="price" type="number" required>{{ __('Price') }}</x-input>
        <x-input inputFor="quantity" type="number">{{ __('Quantity') }}</x-input>
        <x-input inputFor="minimum" type="number">{{ __('Minimum') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add ingredient') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        <x-input inputFor="name" required>{{ __('Name') }}</x-input>
        <x-input inputFor="price" required>{{ __('Price') }} ($/kg)</x-input>
        <x-input inputFor="quantity" type="number">{{ __('Quantity') }} (kg)</x-input>
        <x-input inputFor="minimum" type="number">{{ __('Minimum') }} (kg)</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

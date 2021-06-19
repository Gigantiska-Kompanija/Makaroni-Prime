<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ingredient') }} {{ $ingredient->name }}
        </h2>
        <form method="POST" action="{{ route('ingredients.destroy', $ingredient->name) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('ingredients.update', $ingredient->name) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" val="{{ $ingredient->name }}" required>{{ __('Name') }}</x-input>
        <x-input inputFor="price" val="{{ $ingredient->price }}" required>{{ __('Price') }}</x-input>
        <x-input inputFor="quantity" val="{{ $ingredient->quantity }}">{{ __('Quantity') }}</x-input>
        <x-input inputFor="minimum" val="{{ $ingredient->minimum }}">{{ __('Minimum') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

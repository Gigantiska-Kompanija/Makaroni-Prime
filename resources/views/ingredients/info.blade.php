<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingredient') }} {{ $ingredient->name }}
        </h2>
        <a class="btn btn-warning" href={{ route("ingredients.edit", $ingredient->name) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Name') }}">{{ $ingredient->name }}</x-info-label>
        <x-info-label value="{{ __('Price') }}">{{ $ingredient->price }}$/kg</x-info-label>
        <x-info-label value="{{ __('Quantity') }}">{{ $ingredient->quantity }}kg</x-info-label>
        <x-info-label value="{{ __('Minimum') }}">{{ $ingredient->minimum }}</x-info-label>
    </dl>
</x-app-layout>
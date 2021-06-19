<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Makarons') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('makaroni.store') }}" enctype="multipart/form-data">
        @csrf

        <x-input inputFor="name" required>{{ __('Name') }}</x-input>
        <x-input inputFor="quantity">{{ __('Quantity') }}</x-input>
        <x-input inputFor="price" required>{{ __('Price') }}</x-input>
        <x-input inputFor="shape" required>{{ __('Shape') }}</x-input>
        <x-input inputFor="color" required>{{ __('Color') }}</x-input>
        <x-input inputFor="length" required>{{ __('Length') }}</x-input>
        <x-input inputFor="popularity" required>{{ __('Popularity') }}</x-input>
        <x-input inputFor="image" type="file">Image</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

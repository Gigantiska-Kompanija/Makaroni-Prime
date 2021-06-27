<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }} {{ $makarons->name }}
        </h2>
        <form method="POST" action="{{ route('makaroni.destroy', $makarons->name) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('makaroni.update', $makarons->name) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <x-input inputFor="name" val="{{ $makarons->name }}" required>{{ __('Name') }}</x-input>
        <x-input inputFor="quantity" val="{{ $makarons->quantity }}">{{ __('Quantity') }}</x-input>
        <x-input inputFor="price" val="{{ $makarons->price }}" required>{{ __('Price') }}</x-input>
        <x-input inputFor="shape" val="{{ $makarons->shape }}" required>{{ __('Shape') }}</x-input>
        <x-input inputFor="color" val="{{ $makarons->color }}" required>{{ __('Color') }}</x-input>
        <x-input inputFor="length" val="{{ $makarons->length }}" required>{{ __('Length') }}</x-input>
        <x-input inputFor="popularity" val="{{ $makarons->popularity }}" required>{{ __('Popularity') }}</x-input>
        <x-input inputFor="image" type="file">{{ __('Image') }}</x-input>
        <small>{{ __('Image must be <2MB and .jpg') }}</small>

        <x-submit-btn />
    </form>
</x-app-layout>

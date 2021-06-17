<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $makarons->name }}
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
    <form method="POST" action="{{ route('makaroni.update', $makarons->name) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" val="{{ $makarons->name }}" required>Name</x-input>
        <x-input inputFor="quantity" val="{{ $makarons->quantity }}" required>Quantity</x-input>
        <x-input inputFor="price" val="{{ $makarons->price }}" required>Price</x-input>
        <x-input inputFor="shape" val="{{ $makarons->shape }}" required>Shape</x-input>
        <x-input inputFor="color" val="{{ $makarons->color }}" required>Color</x-input>
        <x-input inputFor="length" val="{{ $makarons->length }}" required>Length</x-input>
        <x-input inputFor="popularity" val="{{ $makarons->popularity }}" required>Popularity</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

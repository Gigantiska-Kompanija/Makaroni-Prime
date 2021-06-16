<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit ingredient {{ $id }}
        </h2>
        <form method="POST" action="{{ route('ingredients.destroy', $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('ingredients.update', $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" required>Name</x-input>
        <x-input inputFor="price" required>Price</x-input>
        <x-input inputFor="quantity" required>Quantity</x-input>
        <x-input inputFor="minimum" required>Minimum</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

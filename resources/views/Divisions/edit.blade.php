<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit division {{ $id }}
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\DivisionController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\DivisionController::class, 'update'], $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" :errors="$errors" required>Name</x-input>
        <x-input inputFor="location" :errors="$errors" required>Location</x-input>
        <x-input inputFor="isOperating" :errors="$errors" required>Is operating</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

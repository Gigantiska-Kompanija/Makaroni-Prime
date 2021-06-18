<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit division :id', ['id' => $id]) }}
        </h2>
        <form method="POST" action="{{ route('divisions.destroy', $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('divisions.update', $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" required>{{ __('Name') }}</x-input>
        <x-input inputFor="location" required>{{ __('Location') }}</x-input>
        <x-input inputFor="isOperating" required>{{ __('Is operating') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

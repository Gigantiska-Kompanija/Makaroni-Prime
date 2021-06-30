<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit division') }} {{ $division->name }}
        </h2>
        <form method="POST" action="{{ route('divisions.destroy', $division->name) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('divisions.update', $division->name) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="name" val="{{ $division->name }}" disabled>{{ __('Name') }}</x-input>
        <x-input inputFor="location" val="{{ $division->location }}" required>{{ __('Location') }}</x-input>
        <div class="mb-3">
            <label for="isOperating" class="form-label">{{ __('Is operating') }}</label>
            <select class="form-select" name="isOperating">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0" {{ $division->isOperating ? '' : 'selected'}}>{{ __('No') }}</option>
            </select>
        </div>
        <x-submit-btn />
    </form>
</x-app-layout>

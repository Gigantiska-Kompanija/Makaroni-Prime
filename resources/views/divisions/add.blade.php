<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add division') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('divisions.store') }}">
        @csrf

        <x-input inputFor="name" required>{{ __('Name') }}</x-input>
        <x-input inputFor="location" required>{{ __('Location') }}</x-input>
        <div class="mb-3">
            <label for="isOperating" class="form-label">{{ __('Is operating') }}</label>
            <select class="form-select" name="isOperating">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
        </div>
        <x-submit-btn />
    </form>
</x-app-layout>

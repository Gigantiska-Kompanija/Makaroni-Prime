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
        <x-input inputFor="isOperating">{{ __('Is operating') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

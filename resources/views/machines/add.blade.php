<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add machine') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('machines.store') }}">
        @csrf

        <x-input inputFor="serialNumber" required>{{ __('Serial number') }}</x-input>
        <x-input inputFor="function">{{ __('Function') }}</x-input>
        <x-input inputFor="located" required>{{ __('Located') }}</x-input>
        <x-input inputFor="model">{{ __('Model') }}</x-input>
        <x-input inputFor="isOperating">{{ __('Is operating') }}</x-input>
        <x-input inputFor="lastServiced">{{ __('Last serviced') }}</x-input>
        <x-input inputFor="needsMaintenance">{{ __('Needs maintenance') }}</x-input>
        <x-input inputFor="purchaseDate">{{ __('Purchase date') }}</x-input>
        <x-input inputFor="decommissionDate">{{ __('Decommission date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

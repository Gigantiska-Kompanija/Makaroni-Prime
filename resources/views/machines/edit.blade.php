<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit machine') }} {{ $machine->serialNumber }}
        </h2>
        <form method="POST" action="{{ route('machines.destroy', $machine->serialNumber) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('machines.update', $machine->serialNumber) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="serialNumber" val="{{ $machine->serialNumber }}" required>{{ __('Serial number') }}</x-input>
        <x-input inputFor="function" val="{{ $machine->function }}">{{ __('Function') }}</x-input>
        <x-input inputFor="located" val="{{ $machine->located }}" required>{{ __('Located') }}</x-input>
        <x-input inputFor="model" val="{{ $machine->model }}">{{ __('Model') }}</x-input>
        <x-input inputFor="isOperating" val="{{ $machine->isOperating }}">{{ __('Is operating') }}</x-input>
        <x-input inputFor="lastServiced" type="date" val="{{ $machine->lastServiced }}">{{ __('Last serviced') }}</x-input>
        <x-input inputFor="needsMaintenance" type="date" val="{{ $machine->needsMaintenance }}">{{ __('Needs maintenance') }}</x-input>
        <x-input inputFor="purchaseDate" type="date" val="{{ $machine->purchaseDate }}">{{ __('Purchase date') }}</x-input>
        <x-input inputFor="decommissionDate" type="date" val="{{ $machine->decommissionDate }}">{{ __('Decommission date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

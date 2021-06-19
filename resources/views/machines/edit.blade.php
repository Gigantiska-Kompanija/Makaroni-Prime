<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit machine :id', ['id' => $machine->serialNumber]) }}
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
        <x-input inputFor="function" val="{{ $machine->function }}" required>{{ __('Function') }}</x-input>
        <x-input inputFor="located" val="{{ $machine->located }}" required>{{ __('Located') }}</x-input>
        <x-input inputFor="model" val="{{ $machine->model }}" required>{{ __('Model') }}</x-input>
        <x-input inputFor="isOperating" val="{{ $machine->isOperating }}" required>{{ __('Is operating') }}</x-input>
        <x-input inputFor="lastServiced" val="{{ $machine->lastServiced }}" required>{{ __('Last serviced') }}</x-input>
        <x-input inputFor="needsMaintenance" val="{{ $machine->needsMaintenance }}" required>{{ __('Needs maintenance') }}</x-input>
        <x-input inputFor="purchaseDate" val="{{ $machine->purchaseDate }}" required>{{ __('Purchase date') }}</x-input>
        <x-input inputFor="decommissionDate" val="{{ $machine->decommissionDate }}" required>{{ __('Decommission date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

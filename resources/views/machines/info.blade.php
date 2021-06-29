<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Machine') }} {{ $machine->serialNumber }}
        </h2>
        <a class="btn btn-warning" href={{ route("machines.edit", $machine->serialNumber) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="{{ __('Serial Number') }}">{{ $machine->serialNumber }}</x-info-label>
        <x-info-label value="{{ __('Function') }}">{{ $machine->function }}</x-info-label>
        <x-info-label value="{{ __('Location') }}">{{ $machine->located }}</x-info-label>
        <x-info-label value="{{ __('Model') }}">{{ $machine->model }}</x-info-label>
        <x-info-label value="{{ __('Is operating') }}">{{ $machine->isOperating ? __('Yes') : __('No') }}</x-info-label>
        <x-info-label value="{{ __('Last serviced') }}">{{ $machine->lastServiced }}</x-info-label>
        <x-info-label value="{{ __('Needs maintenance') }}">{{ $machine->needsMaintenance ? __('Yes') : __('No') }}</x-info-label>
        <x-info-label value="{{ __('Purchase date') }}">{{ $machine->purchaseDate }}</x-info-label>
        <x-info-label value="{{ __('Decommission date') }}">{{ $machine->decommissionDate }}</x-info-label>

    </dl>
</x-app-layout>
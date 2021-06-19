<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Machine {{ $machine->serialNumber }}
        </h2>
        <a class="btn btn-warning" href={{ route("machines.edit", $machine->serialNumber) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="Serial number">{{ $machine->serialNumber }}</x-info-label>
        <x-info-label value="Function">{{ $machine->function }}</x-info-label>
        <x-info-label value="Located">{{ $machine->located }}</x-info-label>
        <x-info-label value="Model">{{ $machine->model }}</x-info-label>
        <x-info-label value="Is operating">{{ $machine->isOperating }}</x-info-label>
        <x-info-label value="Last serviced">{{ $machine->lastServiced }}</x-info-label>
        <x-info-label value="Needs maintenance">{{ $machine->needsMaintenance }}</x-info-label>
        <x-info-label value="Purchase date">{{ $machine->purchaseDate }}</x-info-label>
        <x-info-label value="Decommission date">{{ $machine->decommissionDate }}</x-info-label>

    </dl>
</x-app-layout>
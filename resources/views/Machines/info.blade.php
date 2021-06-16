<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            machine {{ $id }}
        </h2>
        <a class="btn btn-dark" href={{ route("machines.edit", $id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="Serial number">Serial number {{ $id }}</x-info-label>
        <x-info-label value="Function">Function {{ $id }}</x-info-label>
        <x-info-label value="Located">Located {{ $id }}</x-info-label>
        <x-info-label value="Model">Model {{ $id }}</x-info-label>
        <x-info-label value="Is operating">Is operating {{ $id }}</x-info-label>
        <x-info-label value="Last serviced">Last serviced {{ $id }}</x-info-label>
        <x-info-label value="Needs maintenance">Needs maintenance {{ $id }}</x-info-label>
        <x-info-label value="Purchase date">Purchase date {{ $id }}</x-info-label>
        <x-info-label value="Decommission date">Decommission date {{ $id }}</x-info-label>

    </dl>
</x-app-layout>
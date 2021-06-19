<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Machines') }}
            </h2>
            <a class="btn btn-warning" href={{ route("machines.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Located</th>
                <th>Model</th>
                <th>Is operating</th>
                <th>Needs maintenance</th>
            </tr>
        </thead>
        <tbody>
        @foreach($machines as $machine)
            <tr>
                <th><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->serialNumber }}</a></th>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->located }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->model }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->isOperating }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->needsMaintenance }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
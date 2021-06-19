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
                <th>{{ __('Serial Number') }}</th>
                <th>{{ __('Location') }}</th>
                <th>{{ __('Model') }}</th>
                <th>{{ __('Is operating') }}</th>
                <th>{{ __('Needs maintenance') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($machines as $machine)
            <tr>
                <th><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->serialNumber }}</a></th>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->located }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->model }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->isOperating ? __('Yes') : __('No') }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->needsMaintenance ? __('Yes') : __('No') }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
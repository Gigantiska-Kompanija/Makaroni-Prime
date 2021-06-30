<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Machines') }}
            </h2>
            <a class="btn btn-warning" href={{ route("machines.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('machines.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('Serial Number') }}" class="form-control" name="serialNumber" value="{{ $serialNumber }}" aria-describedby="button-addon2">
        <select class="form-select" name="location">
            <option value="">{{ __('Location') }}</option>
            @foreach($locations as $location)
                <option value="{{$location['located']}}" {{ isset($_GET['location']) && $_GET['location'] == $location['located'] ? 'selected' : '' }}>{{ $location['located'] }}</option>
            @endforeach
        </select>
        <select class="form-select" name="isOperating">
            <option value="" >{{ __('Is operating') }}</option>
            <option value="0" {{ isset($_GET['isOperating']) && $_GET['isOperating'] == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
            <option value="1" {{ isset($_GET['isOperating']) && $_GET['isOperating'] == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
        </select>
        <select class="form-select" name="needsMaintenance">
            <option value="" >{{ __('Needs maintenance') }}</option>
            <option value="0" {{ isset($_GET['needsMaintenance']) && $_GET['needsMaintenance'] == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
            <option value="1" {{ isset($_GET['needsMaintenance']) && $_GET['needsMaintenance'] == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
        </select>
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Serial Number') }}</th>
                <th>{{ __('Location') }}</th>
                <th>{{ __('Function') }}</th>
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
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->function }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->model }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->isOperating ? __('Yes') : __('No') }}</a></td>
                <td><a href={{ route("machines.show", $machine->serialNumber) }}>{{ $machine->needsMaintenance ? __('Yes') : __('No') }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($machines) }}
    </div>
</x-app-layout>

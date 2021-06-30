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

        <x-input inputFor="serialNumber" val="{{ $machine->serialNumber }}" disabled>{{ __('Serial number') }}</x-input>
        <x-input inputFor="function" val="{{ $machine->function }}">{{ __('Function') }}</x-input>
        <div class="mb-3">
            <label for="located" class="form-label">{{ __('Located') }}</label>
            <select class="form-select" name="located">
                @foreach($locations as $location)
                    <option value="{{$location['name']}}" {{ $machine->located == $location['name'] ? 'selected' : '' }}>{{ $location['name'] }}</option>
                @endforeach
            </select>
        </div>
        <x-input inputFor="model" val="{{ $machine->model }}">{{ __('Model') }}</x-input>
        <div class="mb-3">
            <label for="isOperating" class="form-label">{{ __('Is operating') }}</label>
            <select class="form-select" name="isOperating">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0" {{ $machine->isOperating ? '' : 'selected'}}>{{ __('No') }}</option>
            </select>
        </div>
        <x-input inputFor="lastServiced" type="date" val="{{ isset($machine->lastServiced) ? date('Y-m-d',strtotime($machine->lastServiced)) : '' }}">{{ __('Last serviced') }}</x-input>
        <div class="mb-3">
            <label for="needsMaintenance" class="form-label">{{ __('Needs maintenance') }}</label>
            <select class="form-select" name="needsMaintenance">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0" {{ $machine->needsMaintenance ? '' : 'selected'}}>{{ __('No') }}</option>
            </select>
        </div>
        <x-input inputFor="purchaseDate" type="date" val="{{ date('Y-m-d',strtotime($machine->purchaseDate)) }}">{{ __('Purchase date') }}</x-input>
        <x-input inputFor="decommissionDate" type="date" val="{{ isset($machine->decommissionDate) ? date('Y-m-d',strtotime($machine->decommissionDate)) : '' }}">{{ __('Decommission date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

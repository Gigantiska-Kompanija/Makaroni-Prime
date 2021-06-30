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
        <div class="mb-3">
            <label for="located" class="form-label">{{ __('Located') }}</label>
            <select class="form-select" name="located" required>
                @foreach($locations as $location)
                    <option value="{{$location['name']}}">{{ $location['name'] }}</option>
                @endforeach
            </select>
        </div>
        <x-input inputFor="model">{{ __('Model') }}</x-input>
        <div class="mb-3">
            <label for="isOperating" class="form-label">{{ __('Is operating') }}</label>
            <select class="form-select" name="isOperating">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
        </div>
        <x-input inputFor="lastServiced" type="date">{{ __('Last serviced') }}</x-input>
        <div class="mb-3">
            <label for="needsMaintenance" class="form-label">{{ __('Needs maintenance') }}</label>
            <select class="form-select" name="needsMaintenance">
                <option value="1">{{ __('Yes') }}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
        </div>
        <x-input inputFor="purchaseDate" type="date">{{ __('Purchase date') }}</x-input>
        <x-input inputFor="decommissionDate" type="date">{{ __('Decommission date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

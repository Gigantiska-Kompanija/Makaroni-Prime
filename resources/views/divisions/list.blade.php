<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Divisions') }}
            </h2>
            <a class="btn btn-warning" href={{ route("divisions.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('divisions.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name" value="{{ $name }}" aria-describedby="button-addon2">
        <input type="text" placeholder="{{ __('Location') }}" class="form-control" name="location" value="{{ $location }}" aria-describedby="button-addon2">
        <select class="form-select" name="isOperating">
            <option value="" >{{ __('Is operating') }}</option>
            <option value="0" {{ isset($_GET['isOperating']) && $_GET['isOperating'] == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
            <option value="1" {{ isset($_GET['isOperating']) && $_GET['isOperating'] == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
        </select>
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Location') }}</th>
                <th>{{ __('Is operating') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($divisions as $division)
            <tr>
                <th><a href={{ route("divisions.show", $division->name) }}>{{ $division->name }}</a></th>
                <td><a href={{ route("divisions.show", $division->name) }}>{{ $division->location }}</a></td>
                <td><a href={{ route("divisions.show", $division->name) }}>{{ $division->isOperating ? __('Yes') : __('No') }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($divisions) }}
    </div>
</x-app-layout>
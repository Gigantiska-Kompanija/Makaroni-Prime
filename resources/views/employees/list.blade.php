<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
            </h2>
            <a class="btn btn-warning" href={{ route("employees.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('employees.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="personalId" value="{{ $personalId }}" aria-describedby="button-addon2">
        <select class="form-select" name="position">
            <option value="">{{ __('Position') }}</option>
            @foreach($positions as $position)
                <option value="{{$position['position']}}" {{ isset($_GET['position']) && $_GET['position'] == $position['position'] ? 'selected' : '' }}>{{ $position['position'] }}</option>
            @endforeach
        </select>
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Last name') }}</th>
                <th>{{ __('Position') }}</th>
                <th>{{ __('Phone number') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->personalId }}</a></th>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->firstName }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->lastName }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->position }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->phoneNumber }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($employees) }}
    </div>
</x-app-layout>
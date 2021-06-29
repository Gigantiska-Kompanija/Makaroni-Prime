<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Division') }} {{ $division->name }}
        </h2>
        <a class="btn btn-warning" href={{ route("divisions.edit", $division->name) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Name') }}">{{ $division->name }}</x-info-label>
        <x-info-label value="{{ __('Location') }}">{{ $division->location }}</x-info-label>
        <x-info-label value="{{ __('Is operating') }}">{{ $division->isOperating ? __('Yes') : __('No') }}</x-info-label>
    </dl>
    <h2 class="fs-2 mt-4">{{ __('Managers') }}:</h2>
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
        @foreach($managers as $manager)
            <tr>
                <th><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->personalId }}</a></th>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->firstName }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->lastName }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->position }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->phoneNumber }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($managers) }}
    </div>
    <h2 class="fs-2 mt-4">{{ __('Employees') }}:</h2>
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
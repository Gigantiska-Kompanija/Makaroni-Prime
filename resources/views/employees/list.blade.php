<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
            </h2>
            <a class="btn btn-warning" href={{ route("employees.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
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
</x-app-layout>
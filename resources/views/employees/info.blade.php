<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $employee->personalId }}
        </h2>
        <a class="btn btn-warning" href={{ route("employees.edit", $employee->personalId) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="Personal ID">{{ $employee->personalId }}</x-info-label>
        <x-info-label value="First name">{{ $employee->firstName }}</x-info-label>
        <x-info-label value="Last name">{{ $employee->lastName }}</x-info-label>
        <x-info-label value="Email">{{ $employee->email }}</x-info-label>
        <x-info-label value="Phone number">{{ $employee->phoneNumber }}</x-info-label>
        <x-info-label value="Position">{{ $employee->position }}</x-info-label>
        <x-info-label value="Pay">{{ $employee->pay }}</x-info-label>
        <x-info-label value="Join date">{{ $employee->joinDate }}</x-info-label>
        <x-info-label value="Leave date">{{ $employee->leaveDate ?? '-' }}</x-info-label>
    </dl>
</x-app-layout>
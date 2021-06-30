<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Employee') }} {{ $employee->personalId }}
        </h2>
        <a class="btn btn-warning" href={{ route("employees.edit", $employee->personalId) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Personal ID') }}">{{ $employee->personalId }}</x-info-label>
        <x-info-label value="{{ __('Name') }}">{{ $employee->firstName }}</x-info-label>
        <x-info-label value="{{ __('Last name') }}">{{ $employee->lastName }}</x-info-label>
        <x-info-label value="{{ __('Email') }}">{{ $employee->email }}</x-info-label>
        <x-info-label value="{{ __('Phone number') }}">{{ $employee->phoneNumber }}</x-info-label>
        <x-info-label value="{{ __('Position') }}">{{ $employee->position }}</x-info-label>
        <x-info-label value="{{ __('Pay') }}">{{ $employee->pay }}{{ isset($employee->pay) ? ' $/m' : '' }}</x-info-label>
        <x-info-label value="{{ __('Join date') }}">{{ $employee->joinDate }}</x-info-label>
        <x-info-label value="{{ __('Leave date') }}">{{ $employee->leaveDate ?? '-' }}</x-info-label>
    </dl>
</x-app-layout>

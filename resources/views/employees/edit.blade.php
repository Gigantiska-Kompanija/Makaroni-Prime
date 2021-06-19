<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit employee :id', ['id' => $employee->personalId]) }}
        </h2>
        <form method="POST" action="{{ route('employees.destroy', $employee->personalId) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('employees.update', $employee->personalId) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="personalId" val="{{ $employee->personalId }}" required>{{ __('Personal ID') }}</x-input>
        <x-input inputFor="firstName" val="{{ $employee->firstName }}" required>{{ __('First name') }}</x-input>
        <x-input inputFor="lastName" val="{{ $employee->lastName }}" required>{{ __('Last name') }}</x-input>
        <x-input inputFor="email" val="{{ $employee->email }}" required>{{ __('Email') }}</x-input>
        <x-input inputFor="phoneNumber" val="{{ $employee->phoneNumber }}" required>{{ __('Phone number') }}</x-input>
        <x-input inputFor="position" val="{{ $employee->position }}" required>{{ __('Position') }}</x-input>
        <x-input inputFor="pay" val="{{ $employee->pay }}" required>{{ __('Salary') }}</x-input>
        <x-input inputFor="joinDate" val="{{ $employee->joinDate }}" required>{{ __('Join date') }}</x-input>
        <x-input inputFor="leaveDate" val="{{ $employee->leaveDate }}">{{ __('Leave date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>
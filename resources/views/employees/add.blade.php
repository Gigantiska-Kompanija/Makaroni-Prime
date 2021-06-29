<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add employee') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <x-input inputFor="personalId" required>{{ __('Personal ID') }}</x-input>
        <x-input inputFor="firstName" required>{{ __('First name') }}</x-input>
        <x-input inputFor="lastName" required>{{ __('Last name') }}</x-input>
        <x-input inputFor="email" required>{{ __('Email') }}</x-input>
        <x-input inputFor="phoneNumber" required>{{ __('Phone number') }}</x-input>
        <x-input inputFor="position">{{ __('Position') }}</x-input>
        <x-input inputFor="pay">{{ __('Salary') }} ($/m)</x-input>
        <x-input inputFor="joinDate" type="date">{{ __('Join date') }}</x-input>
        <x-input inputFor="leaveDate" type="date">{{ __('Leave date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

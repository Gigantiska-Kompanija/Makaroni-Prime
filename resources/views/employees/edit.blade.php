<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit employee :id', ['id' => $id]) }}
        </h2>
        <form method="POST" action="{{ route('employees.destroy', $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('employees.update', $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="personalId" required>{{ __('Personal ID') }}</x-input>
        <x-input inputFor="firstName" required>{{ __('First name') }}</x-input>
        <x-input inputFor="lastName" required>{{ __('Last name') }}</x-input>
        <x-input inputFor="email" required>{{ __('Email') }}</x-input>
        <x-input inputFor="phoneNumber" required>{{ __('Phone number') }}</x-input>
        <x-input inputFor="position" required>{{ __('Position') }}</x-input>
        <x-input inputFor="pay" required>{{ __('Salary') }}</x-input>
        <x-input inputFor="joinDate" required>{{ __('Join date') }}</x-input>
        <x-input inputFor="leaveDate" required>{{ __('Leave date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

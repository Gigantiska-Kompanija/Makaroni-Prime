<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit employee {{ $id }}
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\EmployeeController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\EmployeeController::class, 'update'], $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="personalId" :errors="$errors" required>Personal ID</x-input>
        <x-input inputFor="firstName" :errors="$errors" required>First name</x-input>
        <x-input inputFor="lastName" :errors="$errors" required>Last name</x-input>
        <x-input inputFor="email" :errors="$errors" required>Email</x-input>
        <x-input inputFor="phoneNumber" :errors="$errors" required>Phone number</x-input>
        <x-input inputFor="position" :errors="$errors" required>Position</x-input>
        <x-input inputFor="pay" :errors="$errors" required>Salary</x-input>
        <x-input inputFor="joinDate" :errors="$errors" required>Join date</x-input>
        <x-input inputFor="leaveDate" :errors="$errors" required>Leave date</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

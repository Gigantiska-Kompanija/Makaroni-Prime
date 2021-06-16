<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit machine {{ $id }}
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\MachineController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\MachineController::class, 'update'], $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="serialNumber" :errors="$errors" required>Serial number</x-input>
        <x-input inputFor="function" :errors="$errors" required>Function</x-input>
        <x-input inputFor="located" :errors="$errors" required>Located</x-input>
        <x-input inputFor="model" :errors="$errors" required>Model</x-input>
        <x-input inputFor="isOperating" :errors="$errors" required>Is operating</x-input>
        <x-input inputFor="lastServiced" :errors="$errors" required>Last serviced</x-input>
        <x-input inputFor="needsMaintenance" :errors="$errors" required>Needs maintenance</x-input>
        <x-input inputFor="purchaseDate" :errors="$errors" required>Purchase date</x-input>
        <x-input inputFor="decommissionDate" :errors="$errors" required>Decommision date</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

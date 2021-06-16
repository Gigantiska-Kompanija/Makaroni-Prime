<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add machine
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\MachineController::class, 'store']) }}">
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

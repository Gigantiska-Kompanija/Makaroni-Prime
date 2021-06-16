<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add machine
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('machines.store') }}">
        @csrf

        <x-input inputFor="serialNumber" required>Serial number</x-input>
        <x-input inputFor="function" required>Function</x-input>
        <x-input inputFor="located" required>Located</x-input>
        <x-input inputFor="model" required>Model</x-input>
        <x-input inputFor="isOperating" required>Is operating</x-input>
        <x-input inputFor="lastServiced" required>Last serviced</x-input>
        <x-input inputFor="needsMaintenance" required>Needs maintenance</x-input>
        <x-input inputFor="purchaseDate" required>Purchase date</x-input>
        <x-input inputFor="decommissionDate" required>Decommision date</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

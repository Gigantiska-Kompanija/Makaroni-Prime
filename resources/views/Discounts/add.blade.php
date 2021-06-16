<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add discount
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('discounts.store') }}">
        @csrf

        <x-input inputFor="code" required>Code</x-input>
        <x-input inputFor="amount" required>Amount</x-input>
        <x-input inputFor="startDate" required>Start date</x-input>
        <x-input inputFor="endDate" required>End date</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

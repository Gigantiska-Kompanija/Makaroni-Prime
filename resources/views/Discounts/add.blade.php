<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add discount
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\DiscountController::class, 'store']) }}">
        @csrf

        <x-input inputFor="code" :errors="$errors" required>Code</x-input>
        <x-input inputFor="amount" :errors="$errors" required>Amount</x-input>
        <x-input inputFor="startDate" :errors="$errors" required>Start date</x-input>
        <x-input inputFor="endDate" :errors="$errors" required>End date</x-input>

        <x-submit-btn>Create</x-submit-btn>
    </form>
</x-app-layout>

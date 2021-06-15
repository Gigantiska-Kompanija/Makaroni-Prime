<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit discount {{ $id }}
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\DiscountController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-dark">
                Delete
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\DiscountController::class, 'update'], $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="code" :errors="$errors" required>Code</x-input>
        <x-input inputFor="amount" :errors="$errors" required>Amount</x-input>
        <x-input inputFor="startDate" :errors="$errors" required>Start date</x-input>
        <x-input inputFor="endDate" :errors="$errors" required>End date</x-input>

        <x-submit-btn>Save</x-submit-btn>
    </form>
</x-app-layout>

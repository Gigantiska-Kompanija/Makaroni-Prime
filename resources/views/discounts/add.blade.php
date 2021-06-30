<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add discount') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('discounts.store') }}">
        @csrf

        <x-input inputFor="code" required>{{ __('Code') }}</x-input>
        <x-input inputFor="amount" required>{{ __('Amount') }} (%)</x-input>
        <x-input inputFor="startDate" required type="date">{{ __('Start date') }}</x-input>
        <x-input inputFor="endDate" required type="date">{{ __('End date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

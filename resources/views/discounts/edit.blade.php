<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit discount :id', ['id' => $id]) }}
        </h2>
        <form method="POST" action="{{ route('discounts.destroy', $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('discounts.update', $id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="code" required>{{ __('Code') }}</x-input>
        <x-input inputFor="amount" required>{{ __('Amount') }}</x-input>
        <x-input inputFor="startDate" required>{{ __('Start date') }}</x-input>
        <x-input inputFor="endDate" required>{{ __('End date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

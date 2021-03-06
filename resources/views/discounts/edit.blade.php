<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit discount') }} {{ $discount->code }}
        </h2>
        <form method="POST" action="{{ route('discounts.destroy', $discount->code) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('discounts.update', $discount->code) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="code" val="{{ $discount->code }}" disabled>{{ __('Code') }}</x-input>
        <x-input inputFor="amount" val="{{ $discount->amount * 100 }}" required>{{ __('Amount') }} (%)</x-input>
        <x-input inputFor="startDate" type="date" val="{{ date('Y-m-d',strtotime($discount->startDate)) }}" required>{{ __('Start date') }}</x-input>
        <x-input inputFor="endDate" type="date" val="{{ date('Y-m-d',strtotime($discount->endDate)) }}" required>{{ __('End date') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

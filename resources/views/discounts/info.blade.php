<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Discount') }} {{ $discount->code }}
        </h2>
        <a class="btn btn-warning" href={{ route("discounts.edit", $discount->code) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="{{ __('Code') }}">{{ $discount->code }}</x-info-label>
        <x-info-label value="{{ __('Amount') }}">{{ $discount->amount }}</x-info-label>
        <x-info-label value="{{ __('Start date') }}">{{ $discount->startDate }}</x-info-label>
        <x-info-label value="{{ __('End date') }}">{{ $discount->endDate }}</x-info-label>
    </dl>
</x-app-layout>
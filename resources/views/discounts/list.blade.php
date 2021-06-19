<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discounts') }}
            </h2>
            <a class="btn btn-warning" href={{ route("discounts.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Code') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Start date') }}</th>
                <th>{{ __('End date') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($discounts as $discount)
            <tr>
                <th><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->code }}</a></th>
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->amount }}</a></td>
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->startDate }}</a></td>
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->endDate }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discounts') }}
            </h2>
            <a class="btn btn-warning" href={{ route("discounts.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('discounts.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('Code') }}" class="form-control" name="code" value="{{ $code }}" aria-describedby="button-addon2">
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
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
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->amount * 100 }}%</a></td>
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->startDate }}</a></td>
                <td><a href={{ route("discounts.show", $discount->code) }}>{{ $discount->endDate }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($discounts) }}
    </div>
</x-app-layout>

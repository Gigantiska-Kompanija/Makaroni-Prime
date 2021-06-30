<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Order') }} {{ $order->id }}
            </h2>
        </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Date') }}">{{ $order->orderDate }}</x-info-label>
        <x-info-label value="{{ __('Total') }}">{{ $order->total }}$</x-info-label>
    </dl>
    <h2 class="fs-2 mt-4">{{ __('Products') }}:</h2>
    <table class="table table-striped table-hover">
    <thead>
            <tr>
                <th>{{ __('Makarons') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Price') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order->makaroni()->get() as $subOrder)
            <tr>
                <th>{{ $subOrder->name }}</th>
                <td>{{ $subOrder->pivot->amount }}</td>
                <td>{{ $subOrder->pivot->price }}$</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.$order->makaroni()->count() }}
    </div>
</x-app-layout>

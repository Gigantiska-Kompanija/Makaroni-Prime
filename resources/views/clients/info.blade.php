<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->firstName }} {{ $client->lastName }}
        </h2>
        <a class="btn btn-warning" href={{ route("clients.edit", $client->id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="{{ __('Name') }}">{{ $client->firstName }}</x-info-label>
        <x-info-label value="{{ __('Last name') }}">{{ $client->lastName }}</x-info-label>
        <x-info-label value="{{ __('Register date') }}">{{ $client->registerDate }}</x-info-label>
        <x-info-label value="{{ __('Email') }}">{{ $client->email }}</x-info-label>
        <x-info-label value="{{ __('Phone number') }}">{{ $client->phoneNumber }}</x-info-label>

    </dl>
    <h2 class="fs-2 mt-4">{{ __('Order history') }}:</h2>
    <table class="table table-striped table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Total') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th>{{ $order->id }}</th>
                <td>{{ $order->orderDate }}</td>
                <td>{{ $order->total }}$</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($orders) }}
    </div>
</x-app-layout>
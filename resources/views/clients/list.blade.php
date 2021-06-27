<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
            </h2>
            <a class="btn btn-warning" href={{ route("clients.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('clients.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('ID') }}" class="form-control" name="id" value="{{ $id }}" aria-describedby="button-addon2">
        <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="firstName" value="{{ $firstName }}" aria-describedby="button-addon2">
        <input type="text" placeholder="{{ __('Last name') }}" class="form-control" name="lastName" value="{{ $lastName }}" aria-describedby="button-addon2">
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Last name') }}</th>
                <th>{{ __('Email') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th><a href={{ route("clients.show", $client->id) }}>{{ $client->id }}</a></th>
                <td><a href={{ route("clients.show", $client->id) }}>{{ $client->firstName }}</a></td>
                <td><a href={{ route("clients.show", $client->id) }}>{{ $client->lastName }}</a></td>
                <td><a href={{ route("clients.show", $client->id) }}>{{ $client->email }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($clients) }}
    </div>
</x-app-layout>
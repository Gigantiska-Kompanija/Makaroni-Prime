<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
            </h2>
            <a class="btn btn-warning" href={{ route("clients.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
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
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
            </h2>
            <a class="btn btn-dark" href={{ route("clients.create") }}>+</a>
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
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("clients.show", $i) }}>id {{ $i }}</a></th>
                <td><a href={{ route("clients.show", $i) }}>firstName {{ $i }}</a></td>
                <td><a href={{ route("clients.show", $i) }}>lastName {{ $i }}</a></td>
                <td><a href={{ route("clients.show", $i) }}>email {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
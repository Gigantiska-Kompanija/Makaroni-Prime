<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Divisions') }}
            </h2>
            <a class="btn btn-warning" href={{ route("divisions.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Is operating</th>
            </tr>
        </thead>
        <tbody>
        @foreach($divisions as $division)
            <tr>
                <th><a href={{ route("divisions.show", $division->name) }}>{{ $division->name }}</a></th>
                <td><a href={{ route("divisions.show", $division->name) }}>{{ $division->location }}</a></td>
                <td><a href={{ route("divisions.show", $division->name) }}>{{ $division->isOperating }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
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
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("divisions.show", $i) }}>name {{ $i }}</a></th>
                <td><a href={{ route("divisions.show", $i) }}>location {{ $i }}</a></td>
                <td><a href={{ route("divisions.show", $i) }}>isOperating {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
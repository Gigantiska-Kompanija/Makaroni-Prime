<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makaroni') }}
            </h2>
            <a class="btn btn-dark" href={{ route("makaroni.create") }}>+</a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Popularity</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("makaroni.show", $i) }}>name {{ $i }}</a></th>
                <td><a href={{ route("makaroni.show", $i) }}>quantity {{ $i }}</a></td>
                <td><a href={{ route("makaroni.show", $i) }}>price {{ $i }}</a></td>
                <td><a href={{ route("makaroni.show", $i) }}>popularity {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
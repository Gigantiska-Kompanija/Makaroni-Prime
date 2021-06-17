<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makaroni') }}
            </h2>
            <a class="btn btn-warning" href={{ route("makaroni.create") }}><i class="fas fa-plus"></i></a>
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
        @foreach($makaroni as $makarons)
            <tr>
                <th><a href={{ route("makaroni.show", $makarons->name) }}>{{ $makarons->name }}</a></th>
                <td><a href={{ route("makaroni.show", $makarons->name) }}>{{ $makarons->quantity }}</a></td>
                <td><a href={{ route("makaroni.show", $makarons->name) }}>{{ $makarons->price }}</a></td>
                <td><a href={{ route("makaroni.show", $makarons->name) }}>{{ $makarons->popularity }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
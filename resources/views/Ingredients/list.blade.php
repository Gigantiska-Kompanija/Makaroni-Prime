<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredients') }}
            </h2>
            <a class="btn btn-dark" href={{ route("ingredients.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("ingredients.show", $i) }}>name {{ $i }}</a></th>
                <td><a href={{ route("ingredients.show", $i) }}>price {{ $i }}</a></td>
                <td><a href={{ route("ingredients.show", $i) }}>quantity {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
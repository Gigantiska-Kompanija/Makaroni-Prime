<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredients') }}
            </h2>
            <a class="btn btn-warning" href={{ route("ingredients.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Quantity') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ingredients as $ingredient)
            <tr>
                <th><a href={{ route("ingredients.show", $ingredient->name) }}>{{ $ingredient->name }}</a></th>
                <td><a href={{ route("ingredients.show", $ingredient->name) }}>{{ $ingredient->price }}</a></td>
                <td><a href={{ route("ingredients.show", $ingredient->name) }}>{{ $ingredient->quantity }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
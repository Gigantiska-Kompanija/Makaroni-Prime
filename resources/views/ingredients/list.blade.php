<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredients') }}
            </h2>
            <a class="btn btn-warning" href={{ route("ingredients.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('ingredients.index') }}">
        <label for="belowMin">{{ __('Show only below minimum') }}</label>
        <input name="belowMin" id="belowMin" type="checkbox"{{ $belowMin ? ' checked' : '' }}>
        <div class="input-group mb-3">
            <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name" value="{{ $name }}" aria-describedby="button-addon2">
            <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </form>
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
                <td><a href={{ route("ingredients.show", $ingredient->name) }}>{{ $ingredient->price }}$/kg</a></td>
                <td><a href={{ route("ingredients.show", $ingredient->name) }}>{{ $ingredient->quantity }}kg</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($ingredients) }}
    </div>
</x-app-layout>

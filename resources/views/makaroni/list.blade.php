<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makaroni') }}
            </h2>
            @auth('manager')
            <a class="btn btn-warning" href={{ route("makaroni.create") }}><i class="fas fa-plus"></i></a>
            @endauth
        </div>
    </x-slot>
    <form method="GET" action="{{ route('makaroni.index') }}">
    <div class="input-group mb-3">
        <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name" value="{{ $name }}" aria-describedby="button-addon2">
        <select class="form-select" name="shape">
            <option value="">{{ __('Shape') }}</option>
            @foreach($shapes as $shape)
                <option value="{{$shape['shape']}}" {{ isset($_GET['shape']) && $_GET['shape'] == $shape['shape'] ? 'selected' : '' }}>{{ $shape['shape'] }}</option>
            @endforeach
        </select>
        <select class="form-select" name="color">
            <option value="">{{ __('Color') }}</option>
            @foreach($colors as $color)
                <option value="{{$color['color']}}" {{ isset($_GET['color']) && $_GET['color'] == $color['color'] ? 'selected' : '' }}>{{ $color['color'] }}</option>
            @endforeach
        </select>
        <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Popularity') }}</th>
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
    <div>
        {{ __('Total').': '.count($makaroni) }}
    </div>
</x-app-layout>

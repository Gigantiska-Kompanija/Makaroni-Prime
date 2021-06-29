<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
            </h2>
        </div>
    </x-slot>
    <form method="POST" action="{{ route("form.order") }}">
        @csrf
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Quantity (kg)') }}</th>
                    <th>{{ __('Price per kg') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <th><a href={{ route("makaroni.show", $cartItem->name) }}>{{ $cartItem->name }}</a></th>
                    <td><input name="{{ $cartItem->name }}" type="number" required min="1" max="{{ $cartItem->quantity }}" value="1"> ({{ $cartItem->quantity }} in stock)</td>
                    <td><a href={{ route("makaroni.show", $cartItem->name) }}>{{ $cartItem->price }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-warning"><i class="fas fa-cash-register"></i></button>
    </form>
</x-app-layout>

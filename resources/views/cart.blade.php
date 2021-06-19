<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
            </h2>
            <a class="btn btn-warning" href={{ route("form.order") }}><i class="fas fa-cash-register"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <th><a href={{ route("makaroni.show", $i) }}>name {{ $cartItem->name }}</a></th>
                <td><a href={{ route("makaroni.show", $i) }}>quantity {{ $cartItem->quantity }}</a></td>
                <td><a href={{ route("makaroni.show", $i) }}>price {{ $cartItem->price }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
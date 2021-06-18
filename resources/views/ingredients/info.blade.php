<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            division {{ $id }}
        </h2>
        <a class="btn btn-warning" href={{ route("ingredients.edit", $id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="Name">Name {{ $id }}</x-info-label>
        <x-info-label value="Price">Price {{ $id }}</x-info-label>
        <x-info-label value="Quantity">Quantity {{ $id }}</x-info-label>
        <x-info-label value="Minimum">Minimum {{ $id }}</x-info-label>
    </dl>
</x-app-layout>
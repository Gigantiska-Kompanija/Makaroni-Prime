<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            makarons {{ $id }}
        </h2>
        <a class="btn btn-dark" href={{ route("makaroni.edit", $id) }}>Edit</a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="Name">Name {{ $id }}</x-info-label>
        <x-info-label value="Quantity">Quantity {{ $id }}</x-info-label>
        <x-info-label value="Price">Price {{ $id }}</x-info-label>
        <x-info-label value="Shape">Shape {{ $id }}</x-info-label>
        <x-info-label value="Color">Color {{ $id }}</x-info-label>
        <x-info-label value="Length">Length {{ $id }}</x-info-label>
        <x-info-label value="Popularity">Popularity {{ $id }}</x-info-label>

    </dl>
</x-app-layout>
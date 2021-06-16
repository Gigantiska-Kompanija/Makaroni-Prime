<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            division {{ $id }}
        </h2>
        <a class="btn btn-dark" href={{ route("divisions.edit", $id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="Name">Name {{ $id }}</x-info-label>
        <x-info-label value="Location">Location {{ $id }}</x-info-label>
        <x-info-label value="Is operating">Is operating {{ $id }}</x-info-label>
    </dl>
</x-app-layout>
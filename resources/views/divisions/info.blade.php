<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Division {{ $division->name }}
        </h2>
        <a class="btn btn-warning" href={{ route("divisions.edit", $division->name) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="Name">{{ $division->name }}</x-info-label>
        <x-info-label value="Location">{{ $division->location }}</x-info-label>
        <x-info-label value="Is operating">{{ $division->isOperating }}</x-info-label>
    </dl>
</x-app-layout>
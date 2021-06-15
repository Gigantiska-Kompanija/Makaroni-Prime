<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            discount {{ $id }}
        </h2>
        <a class="btn btn-dark" href={{ route("discounts.edit", $id) }}>Edit</a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="Code">Code {{ $id }}</x-info-label>
        <x-info-label value="Amount">Amount {{ $id }}</x-info-label>
        <x-info-label value="Start date">Start date {{ $id }}</x-info-label>
        <x-info-label value="End date">End date {{ $id }}</x-info-label>
    </dl>
</x-app-layout>
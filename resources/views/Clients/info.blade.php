<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            client {{ $id }}
        </h2>
        <a class="btn btn-warning" href={{ route("clients.edit", $id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="First name">First name {{ $id }}</x-info-label>
        <x-info-label value="Last name">Last name {{ $id }}</x-info-label>
        <x-info-label value="Register date">Register date {{ $id }}</x-info-label>
        <x-info-label value="Email">Email {{ $id }}</x-info-label>
        <x-info-label value="Phone number">Phone number {{ $id }}</x-info-label>

    </dl>
</x-app-layout>
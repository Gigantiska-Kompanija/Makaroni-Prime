<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->firstName }} {{ $client->lastName }}
        </h2>
        <a class="btn btn-warning" href={{ route("clients.edit", $client->id) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        
        <x-info-label value="{{ __('Name') }}">{{ $client->firstName }}</x-info-label>
        <x-info-label value="{{ __('Last name') }}">{{ $client->lastName }}</x-info-label>
        <x-info-label value="{{ __('Register date') }}">{{ $client->registerDate }}</x-info-label>
        <x-info-label value="{{ __('Email') }}">{{ $client->email }}</x-info-label>
        <x-info-label value="{{ __('Phone number') }}">{{ $client->phoneNumber }}</x-info-label>

    </dl>
</x-app-layout>
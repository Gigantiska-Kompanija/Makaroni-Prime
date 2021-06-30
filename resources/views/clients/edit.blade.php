<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit client') }} {{ $client->firstName }} {{ $client->lastName }}
        </h2>
        <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button class="btn btn-warning">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    </x-slot>
    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @method('PUT')
        @csrf

        <x-input inputFor="firstName" val="{{ $client->firstName }}" required>{{ __('First name') }}</x-input>
        <x-input inputFor="lastName" val="{{ $client->lastName }}" required>{{ __('Last name') }}</x-input>
        <x-input inputFor="email" val="{{ $client->email }}" required>{{ __('Email') }}</x-input>
        <x-input inputFor="phoneNumber" val="{{ $client->phoneNumber }}" required>{{ __('Phone number') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Manager') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('managers.store') }}" enctype="multipart/form-data">
        @csrf

        <x-input inputFor="employee" required>{{ __('Personal ID') }}</x-input>
        <x-input inputFor="password" type="password" required>{{ __('Password') }}</x-input>
        <x-input inputFor="admin" type="checkbox">{{ __('Administrator') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

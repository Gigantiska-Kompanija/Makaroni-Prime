<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Managers') }}
            </h2>
            <a class="btn btn-warning" href={{ route("managers.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ __('Personal ID') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($managers as $manager)
            <tr>
                <th>{{ $manager->employee }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>

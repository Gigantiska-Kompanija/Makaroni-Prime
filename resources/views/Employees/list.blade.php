<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
            </h2>
            <a class="btn btn-warning" href={{ route("employees.create") }}><i class="fas fa-plus"></i></a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fist name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("employees.show", $i) }}>id {{ $i }}</a></th>
                <td><a href={{ route("employees.show", $i) }}>name {{ $i }}</a></td>
                <td><a href={{ route("employees.show", $i) }}>lastname {{ $i }}</a></td>
                <td><a href={{ route("employees.show", $i) }}>position {{ $i }}</a></td>
                <td><a href={{ route("employees.show", $i) }}>phone number {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
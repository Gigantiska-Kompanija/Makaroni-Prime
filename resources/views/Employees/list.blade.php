<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
            </h2>
            <a class="btn btn-dark" href={{ route("employees.create") }}>+</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
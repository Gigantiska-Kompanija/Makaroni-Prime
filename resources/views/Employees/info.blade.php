<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EmployeeName
        </h2>
        <a class="btn btn-dark" href={{ route("employees.edit", $id) }}>Edit</a>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="row">
                        <dt class="col-sm-3">Personal ID:</dt>
                        <dd class="col-sm-9">Personal ID {{ $id }}</dd>
                        <dt class="col-sm-3">First name:</dt>
                        <dd class="col-sm-9">First name {{ $id }}</dd>
                        <dt class="col-sm-3">Last name:</dt>
                        <dd class="col-sm-9">Last name {{ $id }}</dd>
                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">Email {{ $id }}</dd>
                        <dt class="col-sm-3">Phone number:</dt>
                        <dd class="col-sm-9">Phone number {{ $id }}</dd>
                        <dt class="col-sm-3">Position:</dt>
                        <dd class="col-sm-9">Position {{ $id }}</dd>
                        <dt class="col-sm-3">Pay:</dt>
                        <dd class="col-sm-9">Pay {{ $id }}</dd>
                        <dt class="col-sm-3">Join date:</dt>
                        <dd class="col-sm-9">Join date {{ $id }}</dd>
                        <dt class="col-sm-3">Leave date:</dt>
                        <dd class="col-sm-9">Leave date {{ $id }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
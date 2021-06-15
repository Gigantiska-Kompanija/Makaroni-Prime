<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            employee {{ $id }}
        </h2>
        <a class="btn btn-dark" href={{ route("employees.edit", $id) }}>Edit</a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="Personal ID">Personal ID {{ $id }}</x-info-label>
        <x-info-label value="First name">First name {{ $id }}</x-info-label>
        <x-info-label value="Last name">Last name {{ $id }}</x-info-label>
        <x-info-label value="Email">Email {{ $id }}</x-info-label>
        <x-info-label value="Phone number">Phone number {{ $id }}</x-info-label>
        <x-info-label value="Position">Position {{ $id }}</x-info-label>
        <x-info-label value="Pay">Pay {{ $id }}</x-info-label>
        <x-info-label value="Join date">Join date {{ $id }}</x-info-label>
        <x-info-label value="Leave date">Leave date {{ $id }}</x-info-label>
    </dl>
</x-app-layout>
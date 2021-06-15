<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discounts') }}
            </h2>
            <a class="btn btn-dark" href={{ route("discounts.create") }}>+</a>
        </div>
    </x-slot>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Code</th>
                <th>Amount</th>
                <th>Start date</th>
                <th>End date</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < 10; $i++)
            <tr>
                <th><a href={{ route("discounts.show", $i) }}>code {{ $i }}</a></th>
                <td><a href={{ route("discounts.show", $i) }}>amount {{ $i }}</a></td>
                <td><a href={{ route("discounts.show", $i) }}>startDate {{ $i }}</a></td>
                <td><a href={{ route("discounts.show", $i) }}>endDate {{ $i }}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-app-layout>
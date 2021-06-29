<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Audit Log') }}
            </h2>
        </div>
    </x-slot>
    <form method="GET" action="{{ route('audit.index') }}">
        <div class="input-group mb-3 align-items-center">
            <span class="mr-2">No</span>
            <input type="datetime-local" placeholder="{{ __('Time interval start') }}" class="form-control" name="timeStart" value="{{ $timeStart }}"
                   aria-describedby="button-addon2">
            <span class="mx-2">līdz</span>
            <input type="datetime-local" placeholder="{{ __('Time interval end') }}" class="form-control" name="timeEnd" value="{{ $timeEnd }}"
                   aria-describedby="button-addon2">
            <button class="btn btn-warning" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ __('Time') }}</th>
            <th>{{ __('Type') }}</th>
            <th>{{ __('Details') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('IP Address') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($audits as $audit)
            <tr>
                <th>{{ $audit->time }}</th>
                <td>{{ $audit->type }}</td>
                <td>{{ $audit->details }}</td>
                <td>{{ $audit->email }}</td>
                <td>{{ $audit->ip }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($audits) }}
    </div>
</x-app-layout>

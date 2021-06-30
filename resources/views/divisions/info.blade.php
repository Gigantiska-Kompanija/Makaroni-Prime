<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Division') }} {{ $division->name }}
        </h2>
        <a class="btn btn-warning" href={{ route("divisions.edit", $division->name) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Name') }}">{{ $division->name }}</x-info-label>
        <x-info-label value="{{ __('Location') }}">{{ $division->location }}</x-info-label>
        <x-info-label value="{{ __('Is operating') }}">{{ $division->isOperating ? __('Yes') : __('No') }}</x-info-label>
    </dl>
    <form method="POST" action="{{ route('divisions.addManager', $division->name) }}">
    @csrf
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="fs-2">{{ __('Managers') }}:</h2>
        @if(count($managersLeft) > 0)
        <div class="d-flex">
            <select class="form-select" name="employee">
                @foreach($managersLeft as $manager)
                    <option value="{{$manager['employee']}}">{{ $manager['employee'] }}</option>
                @endforeach
            </select>
            <button class="btn btn-warning ml-1"><i class="fas fa-plus"></i></button>
        </div>
        @endif
    </div>
    </form>
    <table class="table table-striped table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Last name') }}</th>
                <th>{{ __('Position') }}</th>
                <th>{{ __('Phone number') }}</th>
                <th>{{ __('Remove') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($managers as $manager)
            <tr>
                <th><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->personalId }}</a></th>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->firstName }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->lastName }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->position }}</a></td>
                <td><a href="{{ route('employees.show', $manager->employee) }}">{{ $manager->employee()->first()->phoneNumber }}</a></td>
                <td><button class="btn btn-warning manager-remove" name="{{ $manager->employee }}"><i class="fas fa-minus"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($managers) }}
    </div>
    <form method="POST" action="{{ route('divisions.addEmployee', $division->name) }}">
    @csrf
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="fs-2">{{ __('Employees') }}:</h2>
        @if(count($employeesLeft) > 0)
        <div class="d-flex">
            <select class="form-select" name="employee">
                @foreach($employeesLeft as $employee)
                    <option value="{{$employee['personalId']}}">{{ $employee['personalId'] }}</option>
                @endforeach
            </select>
            <button class="btn btn-warning ml-1"><i class="fas fa-plus"></i></button>
        </div>
        @endif
    </div>
    </form>
    <table class="table table-striped table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Last name') }}</th>
                <th>{{ __('Position') }}</th>
                <th>{{ __('Phone number') }}</th>
                <th>{{ __('Remove') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->personalId }}</a></th>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->firstName }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->lastName }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->position }}</a></td>
                <td><a href={{ route("employees.show", $employee->personalId) }}>{{ $employee->phoneNumber }}</a></td>
                <td><button class="btn btn-warning employee-remove" name="{{ $employee->personalId }}"><i class="fas fa-minus"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($employees) }}
    </div>

    <script>
    $(document).ready(function () {
            $(".employee-remove").each(function(index) {
                $(this).on("click", function() {
                    var url = '{{ route("divisions.removeEmployee", $division->name) }}';
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {_token: CSRF_TOKEN,
                                employee: $(this).attr('name') },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });
            $(".manager-remove").each(function(index) {
                $(this).on("click", function() {
                    var url = '{{ route("divisions.removeManager", $division->name) }}';
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {_token: CSRF_TOKEN,
                                employee: $(this).attr('name') },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>

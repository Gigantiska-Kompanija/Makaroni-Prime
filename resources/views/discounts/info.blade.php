<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Discount') }} {{ $discount->code }}
        </h2>
        <a class="btn btn-warning" href={{ route("discounts.edit", $discount->code) }}><i class="fas fa-pen"></i></a>
    </div>
    </x-slot>
    <dl class="row">
        <x-info-label value="{{ __('Code') }}">{{ $discount->code }}</x-info-label>
        <x-info-label value="{{ __('Amount') }}">{{ $discount->amount * 100 }}%</x-info-label>
        <x-info-label value="{{ __('Start date') }}">{{ $discount->startDate }}</x-info-label>
        <x-info-label value="{{ __('End date') }}">{{ $discount->endDate }}</x-info-label>
    </dl>
    <form method="POST" action="{{ route('discounts.addMakarons', $discount->code) }}">
    @csrf
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="fs-2">{{ __('Makaroni') }}:</h2>
        <div class="d-flex">
            <select class="form-select" name="makarons">
                @foreach($makaroniLeft as $makarons)
                    <option value="{{$makarons['name']}}">{{ $makarons['name'] }}</option>
                @endforeach
            </select>
            <button class="btn btn-warning ml-1"><i class="fas fa-plus"></i></button>
        </div>
    </div>
    </form>
    <table class="table table-striped table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Popularity') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($makaroni as $makarons)
            <tr>
                <th><a href="{{ route('makaroni.show', $makarons->name) }}">{{ $makarons->name }}</a></th>
                <td><a href="{{ route('makaroni.show', $makarons->name) }}">{{ $makarons->quantity }}</a></td>
                <td><a href="{{ route('makaroni.show', $makarons->name) }}">{{ $makarons->price }}$/kg</a></td>
                <td><a href="{{ route('makaroni.show', $makarons->name) }}">{{ $makarons->popularity }}</a></td>
                <td><button class="btn btn-warning makarons-remove" name="{{ $makarons->name }}"><i class="fas fa-minus"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ __('Total').': '.count($makaroni) }}
    </div>
    <script>
        $(".makarons-remove").each(function() {
            $(this).on("click", function() {
                var url = '{{ route("discounts.removeMakarons", $discount->code) }}';
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: CSRF_TOKEN,
                            makarons: $(this).attr('name') },
                    success: function (data) {
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
</x-app-layout>

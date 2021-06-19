<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store') }}
        </h2>
        <a class="btn btn-warning" href={{ route("cart.index") }}><i class="fas fa-shopping-cart"></i></a>
    </div>
    </x-slot>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($makaroni as $makarons)
            <a class="col" href={{ route("makaroni.show", $makarons->name) }}>
                <div class="card h-100">
                @if (file_exists(public_path('assets/images/'.$makarons->name.'.jpg')))
                    <img src="{{ asset('assets/images/'.$makarons->name.'.jpg') }}" class="card-img-top">
                @else
                    <img src="{{ asset('assets/images/default.jpg') }}" class="card-img-top">
                @endif
                <div class="card-img-overlay">
                    <h5 class="card-title fs-2 btn-warning rounded-pill p-3" style="width: fit-content;">#{{ $makarons->popularity }}</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-2">{{ $makarons->name }}</h5>
                        <h5 class="card-title fs-2">{{ $makarons->price }}$</h5>
                    </div>
                    <ul>
                        <li>{{ __('Shape') }}: {{ $makarons->shape }}</li>
                        <li>{{ __('Color') }}: {{ $makarons->color }}</li>
                        <li>{{ __('Length') }}: {{ $makarons->length }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p class="text-muted">{{ __('In stock') }}: {{ $makarons->quantity }}</p>
                </div>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>

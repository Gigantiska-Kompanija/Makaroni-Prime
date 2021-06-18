<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $makarons->name }}
        </h2>
        <div>
            <a class="btn btn-warning" href={{ route("makaroni.edit", $makarons->name) }}><i class="fas fa-cart-plus"></i></a>
            <a class="btn btn-warning ml-1" href={{ route("makaroni.edit", $makarons->name) }}><i class="fas fa-pen"></i></a>
        </div>
    </div>
    </x-slot>
    <div class="card mb-3 border-0">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="https://picsum.photos/id/10/400" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title fs-2 btn-warning rounded-circle p-3" style="width: fit-content;">#{{ $makarons->popularity }}</h5>
            </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex justify-content-between flex-column h-100">
                    <div>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="card-title fs-1">{{$makarons->name}}</h5>
                            <h5 class="card-title fs-1">{{$makarons->price}}$</h5>
                        </div>
                        <ul>
                            <li class="fs-5 mb-2">{{ __('Shape') }}: {{ $makarons->shape }}</li>
                            <li class="fs-5 mb-2">{{ __('Color') }}: {{ $makarons->color }}</li>
                            <li class="fs-5 mb-2">{{ __('Length') }}: {{ $makarons->length }}</li>
                        </ul>
                    </div>
                    <p class="fs-4">{{ __('In stock') }}: {{ $makarons->quantity }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-2">{{ __('Reviews') }}:</h2>
            <a class="btn btn-warning ml-1" href={{ route("review.create", $makarons->name) }}><i class="fas fa-plus"></i></a>
        </div>
        @for ($i = 0; $i < 5; $i++)
            <div class="card mt-4">
                <div class="d-flex justify-content-between align-items-center card-header">
                    <h5>user {{ $i }}</h5>
                    <h5>date {{ $i }}</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">rating {{ $i }}</h5>
                    <p class="card-text">comment {{ $i }}</p>
                </div>
            </div>
        @endfor
    </div>
</x-app-layout>

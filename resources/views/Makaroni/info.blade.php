<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            makarons {{ $id }}
        </h2>
        <div>
            <a class="btn btn-warning" href={{ route("makaroni.edit", $id) }}><i class="fas fa-cart-plus"></i></a>
            <a class="btn btn-warning ml-1" href={{ route("makaroni.edit", $id) }}><i class="fas fa-pen"></i></a>
        </div>
    </div>
    </x-slot>
    <div class="card mb-3 border-0">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="https://picsum.photos/id/{{$id}}/400" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title fs-2 btn-warning rounded-circle p-3" style="width: fit-content;">#{{ $id }}</h5>
            </div>
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex justify-content-between flex-column h-100">
                    <div>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="card-title fs-1">Name {{$id}}</h5>
                            <h5 class="card-title fs-1">{{$id}}$</h5>
                        </div>
                        <ul>
                            <li class="fs-5 mb-2">Shape: shape {{ $id }}</li>
                            <li class="fs-5 mb-2">Color: color {{ $id }}</li>
                            <li class="fs-5 mb-2">Length: length {{ $id }}</li>
                        </ul>
                    </div>
                    <p class="fs-4">In stock: {{ $id }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-2">Reviews:</h2>
            <a class="btn btn-warning ml-1" href={{ route("review.create") }}><i class="fas fa-plus"></i></a>
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
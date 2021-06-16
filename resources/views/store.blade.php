<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Store
        </h2>
        <a class="btn btn-warning" href={{ route("cart.index") }}><i class="fas fa-shopping-cart"></i></a>
    </div>
    </x-slot>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @for ($i = 0; $i < 10; $i++)
            <a class="col" href={{ route("makaroni.show", $i) }}>
                <div class="card h-100">
                <img src="https://picsum.photos/id/{{ $i }}/200" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title fs-2 btn-warning rounded-circle p-3" style="width: fit-content;">#{{ $i }}</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-2">Name {{$i}}</h5>
                        <h5 class="card-title fs-2">{{$i}}$</h5>
                    </div>
                    <ul>
                        <li>Shape: shape {{ $i }}</li>
                        <li>Color: color {{ $i }}</li>
                        <li>Length: length {{ $i }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p class="text-muted">In stock: {{ $i }}</p>
                </div>
                </div>
            </a>
        @endfor
    </div>
</x-app-layout>
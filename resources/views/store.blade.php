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
        @foreach($makaroni as $makarons)
            <a class="col" href={{ route("makaroni.show", $makarons->name) }}>
                <div class="card h-100">
                <img src="https://picsum.photos/id/10/200" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title fs-2 btn-warning rounded-circle p-3" style="width: fit-content;">#{{ $makarons->popularity }}</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-2">{{ $makarons->name }}</h5>
                        <h5 class="card-title fs-2">{{ $makarons->price }}$</h5>
                    </div>
                    <ul>
                        <li>Shape: shape {{ $makarons->shape }}</li>
                        <li>Color: color {{ $makarons->color }}</li>
                        <li>Length: length {{ $makarons->length }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p class="text-muted">In stock: {{ $makarons->quantity }}</p>
                </div>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
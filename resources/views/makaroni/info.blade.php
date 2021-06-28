<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $makarons->name }}
        </h2>
        <div>
            <form method="POST" action="{{ route("cart.store") }}">
                @method('POST')
                @csrf
                <input type="hidden" name="name" value="{{ $makarons->name }}">
                <button type="submit" class="btn btn-warning"><i class="fas fa-cart-plus"></i></button>
            </form>
            @auth('manager')
            <a class="btn btn-warning ml-1" href={{ route("makaroni.edit", $makarons->name) }}><i class="fas fa-pen"></i></a>
            @endauth
        </div>
    </div>
    </x-slot>
    <div class="card mb-3 border-0">
        <div class="row g-0">
            <div class="col-md-4">
            @if (file_exists(public_path('assets/images/'.$makarons->name.'.jpg')))
                    <img src="{{ asset('assets/images/'.$makarons->name.'.jpg') }}" class="card-img-top" style="height:100%;">
                @else
                    <img src="{{ asset('assets/images/default.jpg') }}" class="card-img-top">
                @endif
            <div class="card-img-overlay">
                <h5 class="card-title fs-2 btn-warning rounded-pill p-3" style="width: fit-content;">#{{ $makarons->popularity }}</h5>
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
            @auth
            <a class="btn btn-warning ml-1" href={{ route("review.create", $makarons->name) }}><i class="fas fa-plus"></i></a>
            @endauth
        </div>
        @foreach($reviews as $review)
            <div class="card mt-4">
                <div class="d-flex justify-content-between align-items-center card-header">
                    <h5>{{ $review->clientID }}</h5>
                    <div class="d-flex align-items-center">
                        @auth('manager')
                        <button class="delete-review btn btn-warning mr-4" id={{ $review->id }}><i class="fas fa-trash-alt"></i></button>
                        @endauth
                        <h5>{{ $review->date }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('Rating') }}: {{ $review->rating }}/5</h5>
                    <p class="card-text">{{ __('Comment') }}: {{ $review->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        $(document).ready(function () {
            $(".delete-review").each(function(index) {
                $(this).on("click", function() {
                    var url = '{{ route("review.destroy", ":id") }}';
                    url = url.replace(':id', $(this).attr('id'));
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {_token: CSRF_TOKEN },
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

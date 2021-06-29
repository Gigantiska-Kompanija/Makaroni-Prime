<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{ route("form.order") }}">
        @csrf
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Quantity (kg)') }}</th>
                    <th>{{ __('Price per kg') }}</th>
                    <th>{{ __('Remove') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <th><a href={{ route("makaroni.show", $cartItem->name) }}>{{ $cartItem->name }}</a></th>
                    <td><input name="{{ $cartItem->name }}" data-name="{{ $cartItem->name }}" type="number" required min="1" max="{{ $cartItem->quantity }}"
                               value="{{ $amounts[$cartItem->name] }}"> ({{ $cartItem->quantity }} in stock)</td>
                    <td><a href={{ route("makaroni.show", $cartItem->name) }}>{{ $cartItem->price }}$</a></td>
                    <td><button class="btn btn-warning cart-remove" name="{{ $cartItem->name }}"><i class="fas fa-minus"></i></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-warning"><i class="fas fa-cash-register"></i></button>
    </form>
    <script>
    $(document).ready(function () {
            $(".cart-remove").each(function(index) {
                $(this).on("click", function() {
                    var url = '{{ route("cart.store") }}';
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {_token: CSRF_TOKEN,
                                name: $(this).attr('name') },
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
<script>
    var url = '{{ route('cart.amounts') }}';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var timeouts = {};
    var maxTime = 800;
    $('table input[type=number]').each(function () {
        $(this).change(function (e) {
            var name = e.target.dataset.name;
            if (name in timeouts) {
                clearTimeout(timeouts[name]);
            }
            timeouts[name] = setTimeout(function () {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: CSRF_TOKEN, name: name, amount: e.target.value},
                    success: function () {
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }, maxTime);
        });
    })
</script>

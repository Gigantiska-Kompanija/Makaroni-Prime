<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('form.storeOrder') }}">
        @csrf

        <x-input inputFor="cardNr" required>{{ __('Credit card number') }}</x-input>
        <label for="expDate" class="form-label">{{ __('Expiration date') }}</label>
        <div class="d-flex mb-3">
            <select name='expireMM' id='expireMM' class="form-select">
                <option value=''>Month</option>
                <option value='01'>01</option>
                <option value='02'>02</option>
                <option value='03'>03</option>
                <option value='04'>04</option>
                <option value='05'>05</option>
                <option value='06'>06</option>
                <option value='07'>07</option>
                <option value='08'>08</option>
                <option value='09'>09</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
            </select>
            <select name='expireYY' id='expireYY' class="form-select">
                <option value=''>Year</option>
                <option value='21'>21</option>
                <option value='22'>22</option>
                <option value='23'>23</option>
                <option value='24'>24</option>
            </select> 
        </div>
        <x-input inputFor="code" required placeholder="CVV">{{ __('Security code') }}</x-input>
        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-warning">
                <i class="fas fa-money-bill"></i>
            </button>
        </div>
    </form>
</x-app-layout>

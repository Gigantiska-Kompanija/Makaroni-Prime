<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add review') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('review.store', $id) }}">
        @csrf

        <label class="mb-3" style="width: 100%;">
            {{ __('Rating') }}<br/>
            <div class="flex">
                <span>0</span>
                <input name="rating" type="range" min="0" max="5" value="5" step="1" class="flex-grow mx-2 block">
                <span>5</span>
            </div>
        </label>
        <x-input inputFor="comment" required>{{ __('Comment') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

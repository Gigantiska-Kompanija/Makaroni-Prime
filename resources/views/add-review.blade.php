<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add review') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('review.store', $id) }}">
        @csrf

        <x-input inputFor="rating" required>{{ __('Rating') }}</x-input>
        <x-input inputFor="comment" required>{{ __('Comment') }}</x-input>

        <x-submit-btn />
    </form>
</x-app-layout>

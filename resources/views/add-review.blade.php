<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add machine
        </h2>
    </x-slot>
    <form method="POST" action="{{ action([App\Http\Controllers\ReviewController::class, 'store']) }}">
        @csrf

        <x-input inputFor="rating" required>Rating</x-input>
        <x-input inputFor="comment" required>Comment</x-input>
        
        <x-submit-btn />
    </form>
</x-app-layout>

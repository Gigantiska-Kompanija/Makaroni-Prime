@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <strong class="text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </strong>
    </div>
@endif

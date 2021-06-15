@props(['disabled' => false, 'required' => false, 'inputFor' => 'a', 'errors' => []])

<div>
    <label for={{ $inputFor }} class="form-label">{{ $slot }}</label>
    <input {{ $required ? 'required' : '' }} class="form-control mb-3" id={{ $inputFor }} :value={{ old($inputFor) }} />
    <x-validation-error class="mb-4" :errors="$errors" title={{ $inputFor }}/>  
</div>

<!-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mb-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}> -->

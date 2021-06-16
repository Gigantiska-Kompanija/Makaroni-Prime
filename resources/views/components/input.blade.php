@props(['disabled' => false, 'required' => false, 'inputFor' => 'a', 'type' => 'text'])

<div class="mb-3">
    <label for={{ $inputFor }} class="form-label">{{ $slot }}</label>
    <input {{ $required ? 'required' : '' }} 
            class="form-control {{ $errors->get($inputFor) ? 'border-danger' : '' }}" 
            id={{ $inputFor }} 
            name={{ $inputFor }}  b
            type={{ $type }}
            value="{{ old($inputFor) }}" />
    @error($inputFor)
    <div>
        <span class="text-red-600" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    </div>
    @enderror

</div>
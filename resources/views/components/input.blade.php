@props(['disabled' => false, 'required' => false, 'inputFor' => 'a', 'type' => 'text', 'val' => '', 'placeholder' => ''])

<div class="mb-3">
    <label for={{ $inputFor }} class="form-label">{{ $slot }}</label>
    <input {{ $required ? 'required' : '' }}
            class="form-control {{ $errors->get($inputFor) ? 'border-danger' : '' }}"
            id={{ $inputFor }}
            name={{ $inputFor }}
            type={{ $type }}
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'readonly' : '' }}
            value="{{ old($inputFor) ?? $val }}" />
    @error($inputFor)
    <div>
        <span class="text-red-600" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    </div>
    @enderror

</div>

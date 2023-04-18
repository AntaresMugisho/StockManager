

@php
    $type ??= "text";
    $name ??= null;    
    $label ??= null;
    $value ??= null;
@endphp

<div class="field-container">
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == "textarea")
        <textarea name="{{ $name }}" id="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="{{ $name }}@error($name) is-invalid @enderror" type="{{ $type }}" {{$type == 'number' ? "min=0 step=any" : null}} name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" required>
    @endif

    @error($name)
        <small class="error-message">{{ $message }}</small>
    @enderror
</div>
@php
    $type ??= "text";
    $name ??= null;    
    $label ??= null;    
@endphp


<div class="field-container">
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == "textarea")
        <textarea name="{{ $name }}" id="{{ $name }}">{{ old($name) }}</textarea>
    @else
        <input class="{{ $name }}@error($name) is-invalid @enderror" type="{{ $type }}" {{$type == 'number' ? "min=0 step=any" : null}} name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" required>
    @endif

    @error($name)
        <small class="error-message">{{ $message }}</small>
    @enderror
</div>
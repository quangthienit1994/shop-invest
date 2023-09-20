<div class="form-floating mb-3">
    <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="field-{{ $name }}" value="{{ old($name, $value ?? '') }}">
    <label for="field-{{ $name }}">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
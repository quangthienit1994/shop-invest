<div class="form-floating mb-3">
    <textarea rows="8" style="min-height: 200px" type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="field-{{ $name }}">{{ old($name, $value ?? '') }}</textarea>
    <label for="field-{{ $name }}">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-muted text-secondary">(harus diisi)</span>
        @endif
    </label>
    <textarea name="{{ $inputName }}" id="{{ $inputId }}"
        placeholder="{{ isset($inputPlaceholder) ? $inputPlaceholder : 'Input ' . $inputLabel }}"
        class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) is-invalid @enderror"
        @if (isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif @if (isset($inputIsRequired) && $inputIsRequired === true) required @endif rows="4">{{ isset($inputValue) ? $inputValue : old($inputName) }}</textarea>

    @error($inputName)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

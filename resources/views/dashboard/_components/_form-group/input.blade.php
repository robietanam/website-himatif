<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) <span class="text-muted text-secondary">(harus diisi)</span> @endif
    </label>
    <input
        type="{{ isset($inputType) ? $inputType : "text" }}"
        name="{{ $inputName }}"
        id="{{ $inputId }}"
        value="{{ isset($inputValue) ? $inputValue : old($inputName) }}"
        placeholder="Input {{ $inputLabel }}"
        class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) is-invalid @enderror"
        @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
        @if(isset($inputIsReadOnly) && $inputIsReadOnly === true) readonly @endif
        @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif>

    @isset($inputHelp)
        <small class="form-text text-muted">{!! $inputHelp !!}</small>
    @endisset

    @error($inputName)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

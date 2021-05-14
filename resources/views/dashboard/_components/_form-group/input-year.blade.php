<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) <span class="text-muted text-secondary">(harus diisi)</span> @endif
    </label>
        
    <div class="input-group">
        <input 
            type="text" 
            name="{{ $inputName }}"
            id="{{ $inputId }}"
            value="{{ isset($inputValue) ? $inputValue : old($inputName) }}"
            placeholder="yyyy"
            class="form-control form-control-year {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) is-invalid @enderror"
            @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
            @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif>
        <div class="input-group-append" disabled>
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
        </div>
    </div>

    @error($inputName)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
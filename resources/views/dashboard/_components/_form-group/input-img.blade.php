<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) <span class="text-muted text-secondary">(harus diisi)</span> @endif
    </label>

    <div class="custom-file">
        <input 
            type="file" 
            name="{{ $inputName }}"
            id="{{ $inputId }}" onchange="openFile(event, '#{{ $inputPreviewIdentity }}')"
            @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif
            @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
            class="custom-file-input @error($inputName) is-invalid @enderror" >
        <label class="custom-file-label" for="{{ $inputName }}">Choose file</label>

        @error($inputName)
        <div class="invalid-feedback pt-2">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
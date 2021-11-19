{{-- full example : datakey must chaining --}}
{{-- @component('dashboard._components._form-group.input-radio')
    @slot('inputLabel', 'Status')
    @slot('inputName', 'status')
    @slot('inputId', 'input-status')
    @slot('inputIsRequired', true)
    @slot('inputCheckedValue', 1)
    @slot('inputDatas', [
        'aktif' => 1,
        'nonaktif' => 0,
    ])
    @slot('inputValue', 1)
@endcomponent --}}


<div class="form-group">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) <span class="text-muted text-secondary">(harus diisi)</span> @endif
    </label>

    @foreach ($inputDatas as $datakey => $datavalue)
    <div class="custom-control custom-radio">
        <input
            type="radio"
            name="{{ $inputName }}"
            value="{{ $datavalue }}"
            id="input-radio-{{ $inputName }}-{{ $datavalue }}"
            {{ (isset($inputValue) && strval($inputValue) === strval($datavalue)) || old($inputName) === strval($datavalue) ? 'checked' : '' }}
            @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif
            @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
            class="custom-control-input @error($inputName) is-invalid @enderror">
        <label class="custom-control-label font-weight-bold" for="input-radio-{{ $inputName }}-{{ $datavalue }}">{!! $datakey !!}</label>
    </div>
    @endforeach

    @error($inputName)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

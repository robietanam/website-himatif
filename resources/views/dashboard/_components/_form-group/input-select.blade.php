{{-- Full example : array must contains key & value only (not object) --}}
{{-- @php
    $inputDatasDivision = [];
    foreach ($divisions as $division) {
        $inputDatasDivision["$division->name_position | $division->name_slug"] = $division->id;
    }
@endphp
@component('dashboard._components._form-group.input-select')
    @slot('inputLabel', 'Divisi')
    @slot('inputName', 'division_id')
    @slot('inputId', 'input-division_id')
    @slot('inputHelp', 'Jika tidak diisi default akan <b>Anggota</b>')
    @slot('inputIsRequired', true)
    @slot('inputIsSearchable', true)
    @slot('inputDatas', $inputDatasDivision)
    @slot('inputValue', 3)
@endcomponent --}}

<div class="form-group">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) <span class="text-muted text-secondary">(harus diisi)</span> @endif
    </label> <br>
    <select 
        name="{{ $inputName }}" 
        id="{{ $inputId }}"
        data-width="100%" 
        data-size="5"
        @if(isset($inputIsSearchable) && $inputIsSearchable === true) 
            data-live-search="true"
            data-live-search-placeholder="Cari..." 
        @endif
        title="Pilih {{ $inputLabel }}"
        @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif
        @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
        class="selectpicker @error($inputName) is-invalid @enderror">
            {{-- {!! $inputDatas !!} --}}
            @foreach ($inputDatas as $datakey => $datavalue)
                <option {{ 
                    (isset($inputValue) && strval($inputValue) === strval($datavalue)) || old($inputName) === strval($datavalue) ? 'selected' : '' }} 
                    value="{{ $datavalue }}">
                        {{ $datakey }}
                </option>
            @endforeach
    </select>
    @isset($inputHelp) 
        <small class="form-text text-muted">{!! $inputHelp !!}</small> 
    @endisset

    @error($inputName)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
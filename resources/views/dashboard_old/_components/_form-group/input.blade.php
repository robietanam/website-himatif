<div class="mb-4 mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-gray-700 text-gray-600">(harus diisi)</span>
        @endif
    </label>
    <input type="{{ isset($inputType) ? $inputType : 'text' }}" name="{{ $inputName }}" id="{{ $inputId }}"
        value="{{ isset($inputValue) ? $inputValue : old($inputName) }}" placeholder="Input {{ $inputLabel }}"
        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) bg-red-700 @enderror"
        @if (isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif @if (isset($inputIsReadOnly) && $inputIsReadOnly === true) readonly @endif
        @if (isset($inputIsRequired) && $inputIsRequired === true) required @endif>

    @isset($inputHelp)
        <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
    @endisset

    @error($inputName)
        <div class="hidden mt-1 text-sm text-red">
            {{ $message }}
        </div>
    @enderror
</div>

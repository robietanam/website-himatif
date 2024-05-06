<div class="mb-4 mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-gray-700 text-gray-600">(harus diisi)</span>
        @endif
    </label>

    <table class="w-full max-w-full mb-4 bg-transparent table-bordered" id="dynamicAddRemoveImage">
        <tr>
            <th>Subject</th>
            <th>Action</th>
        </tr>
        @if (isset($inputValue) && $inputValue != null && $inputValue != [])
            @foreach ($inputValue as $key => $value)
                <tr>
                    <td>
                        <div class="custom-file">

                            <input type="file" name="{{ $inputName }}" id="{{ $inputId }}"
                                onchange="openFile(event, '#{{ $inputPreviewIdentity }}')"
                                @if (isset($inputIsRequired) && $inputIsRequired === true) required @endif
                                @if (isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
                                class="custom-file-input @error($inputName) bg-red-700 @enderror">
                            <label class="custom-file-label" for="{{ $inputName }}">{{ $value }}
                            </label>



                            @error($inputName)
                                <div class="text-invalid pt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </td>

                    @if ($key == 0)
                        <td>
                            <button type="button" name="add" id="dynamic-ar-image"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-white bg-white hover:bg-blue-600">Add
                                Subject
                            </button>
                        </td>
                    @else
                        <td>
                            <button type="button"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-red-600 border-red-600 hover:bg-red-600 hover:text-white bg-white hover:bg-red-700 remove-input-field">Delete</button>
                        </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td>
                    <div class="custom-file">
                        <input type="file" name="{{ $inputName }}" id="{{ $inputId }}"
                            onchange="openFile(event, '#{{ $inputPreviewIdentity }}')"
                            @if (isset($inputIsRequired) && $inputIsRequired === true) required @endif
                            @if (isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
                            class="custom-file-input @error($inputName) bg-red-700 @enderror">
                        <label class="custom-file-label" for="{{ $inputName }}">Choose file</label>

                        @error($inputName)
                            <div class="text-invalid pt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </td>
                <td>
                    <button type="button" name="add" id="dynamic-ar-image"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-white bg-white hover:bg-blue-600">Add
                        Subject
                    </button>
                </td>
                </td>
        @endif


        </tr>
    </table>


</div>

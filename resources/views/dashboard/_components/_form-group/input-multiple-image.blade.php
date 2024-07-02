<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-muted text-secondary">(harus diisi)</span>
        @endif
    </label>

    <table class="table table-bordered" id="dynamicAddRemoveImage">
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
                                class="custom-file-input @error($inputName) is-invalid @enderror">
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
                                class="btn btn-outline-primary">Add
                                Subject
                            </button>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
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
                            class="custom-file-input @error($inputName) is-invalid @enderror">
                        <label class="custom-file-label" for="{{ $inputName }}">Choose file</label>

                        @error($inputName)
                            <div class="text-invalid pt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </td>
                <td>
                    <button type="button" name="add" id="dynamic-ar-image" class="btn btn-outline-primary">Add
                        Subject
                    </button>
                </td>
                </td>
        @endif


        </tr>
    </table>


</div>

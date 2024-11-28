<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-muted text-secondary">(harus diisi)</span>
        @endif
    </label>

    <table class="table table-bordered" id="dynamicAddRemove">
        <tr>
            <th>Subject</th>
            <th>Action</th>
        </tr>
        @if (isset($inputValue))
            @foreach ($inputValue as $key => $value)
                <tr>
                    <td>
                        <input type="{{ isset($inputType) ? $inputType : 'text' }}"
                            name="{{ isset($inputName) ? $inputName : 'misi' }}[]"
                            value="{{ isset($value) ? $value : old($value) }}" placeholder="Input {{ $inputLabel }}"
                            class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($value[0]) is-invalid @enderror"
                            required>

                        @isset($inputHelp)
                            <small class="form-text text-muted">{!! $inputHelp !!}</small>
                        @endisset

                        @error($inputName)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>

                    @if ($key == 0)
                        <td>
                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+
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
                    <input type="{{ isset($inputType) ? $inputType : 'text' }}"
                        name="{{ isset($inputName) ? $inputName : 'misi' }}[]" value=""
                        placeholder="Input {{ $inputLabel }}"
                        class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) is-invalid @enderror"
                        required>

                    @isset($inputHelp)
                        <small class="form-text text-muted">{!! $inputHelp !!}</small>
                    @endisset

                    @error($inputName)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </td>

                <td>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+
                    </button>
                </td>
            </tr>
        @endif


        </tr>
    </table>


</div>

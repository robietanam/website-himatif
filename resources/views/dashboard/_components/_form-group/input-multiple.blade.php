<div class="form-group mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-muted text-secondary">(harus diisi)</span>
        @endif
    </label>

    <table class="table table-bordered" id="dynamicAddRemove">
        <tr>
            <th colspan="3">Subject</th>
            <th>Action</th>
        </tr>
        @if (isset($inputValue))
            @foreach ($inputValue as $key => $value)
                <tr>
                    <td>
                        <input type="{{ isset($inputType) ? $inputType : 'text' }}" name="timeline_name[]"
                            value="{{ isset($value) ? $value[0] : old($value[0]) }}"
                            placeholder="Input {{ $inputLabel }}"
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
                    <td>
                        <input type="datetime-local" name="timeline_time[]"
                            value="{{ isset($value) ? $value[1] : old($value[1]) }}"
                            placeholder="Input {{ $inputLabel }}"
                            class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($value[1]) is-invalid @enderror"
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
                        <input type="datetime-local" name="timeline_time_end[]"
                            value="{{ isset($value) ? $value[2] ?? '' : old($value[2]) }}"
                            placeholder="Input {{ $inputLabel }}"
                            class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($value[2] ?? '') is-invalid @enderror"
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
                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
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
                    <input type="{{ isset($inputType) ? $inputType : 'text' }}" name="timeline_name[]" value=""
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
                    <input type="datetime-local" name="timeline_time[]" value=""
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
                    <input type="datetime-local" name="timeline_time_end[]" value=""
                        placeholder="Input {{ $inputLabel }}"
                        class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($value[2] ?? '') is-invalid @enderror"
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

                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                        Subject
                    </button>
                </td>
                </td>
        @endif


        </tr>
    </table>


</div>

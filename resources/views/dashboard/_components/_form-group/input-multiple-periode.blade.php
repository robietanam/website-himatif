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
                    <td style="width:80%">
                        @component('dashboard._components._form-group.input-year')
                            @slot('inputLabel', 'Tahun')
                            @slot('inputName', 'periode_year[]')
                            @slot('inputId', 'input-year_entry')
                            @slot('inputValue', $value['year'])
                        @endcomponent
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Divisi')
                            @slot('inputName', 'periode_division[]')
                            @slot('inputId', 'input-division_id')
                            @slot('inputIsRequired', true)
                            @slot('inputIsSearchable', true)
                            @slot('inputValue', $value['division_id'])
                            @slot('inputDatas', $divisionOption)
                        @endcomponent
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Jabatan')
                            @slot('inputName', 'periode_position[]')
                            @slot('inputId', 'input-position')
                            @slot('inputIsRequired', true)
                            @slot('inputIsSearchable', true)
                            @slot('inputValue', $value['position'])
                            @slot('inputDatas', $positionOption)
                        @endcomponent
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
                    @component('dashboard._components._form-group.input-year')
                        @slot('inputLabel', 'Tahun Masuk')
                        @slot('inputName', 'periode_year[]')
                        @slot('inputId', 'input-periode-year_entry')
                    @endcomponent
                    @component('dashboard._components._form-group.input-select')
                        @slot('inputLabel', 'Divisi')
                        @slot('inputName', 'periode_division[]')
                        @slot('inputId', 'input-periode-division_id')
                        @slot('inputIsRequired', true)
                        @slot('inputIsSearchable', true)
                        @slot('inputDatas', $divisionOption)
                    @endcomponent
                    @component('dashboard._components._form-group.input-select')
                        @slot('inputLabel', 'Jabatan')
                        @slot('inputName', 'periode_position[]')
                        @slot('inputId', 'input-periode-position')
                        @slot('inputIsRequired', true)
                        @slot('inputIsSearchable', true)
                        @slot('inputDatas', $positionOption)
                    @endcomponent
                </td>
                <td>

                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                        Subject
                    </button>
                </td>
            </tr>
        @endif


        </tr>
    </table>


</div>

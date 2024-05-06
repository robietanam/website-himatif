<div class="mb-4 mb-3">
    <label for="">
        {{ $inputLabel }}
        @if (isset($inputIsRequired) && $inputIsRequired === true)
            <span class="text-gray-700 text-gray-600">(harus diisi)</span>
        @endif
    </label>

    <table class="w-full max-w-full mb-4 bg-transparent table-bordered" id="dynamicAddRemove">
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
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($value[0]) bg-red-700 @enderror"
                            required>

                        @isset($inputHelp)
                            <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
                        @endisset

                        @error($inputName)
                            <div class="hidden mt-1 text-sm text-red">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                    <td>
                        <input type="datetime-local" name="timeline_time[]"
                            value="{{ isset($value) ? $value[1] : old($value[1]) }}"
                            placeholder="Input {{ $inputLabel }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($value[1]) bg-red-700 @enderror"
                            required>

                        @isset($inputHelp)
                            <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
                        @endisset

                        @error($inputName)
                            <div class="hidden mt-1 text-sm text-red">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                    <td>
                        <input type="datetime-local" name="timeline_time_end[]"
                            value="{{ isset($value) ? $value[2] ?? '' : old($value[2]) }}"
                            placeholder="Input {{ $inputLabel }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($value[2] ?? '') bg-red-700 @enderror"
                            required>

                        @isset($inputHelp)
                            <small class="block mt-1 text-gray-700">Samakan jika cuma butuh 1 tanggal</small>
                        @endisset

                        @error($inputName)
                            <div class="hidden mt-1 text-sm text-red">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                    @if ($key == 0)
                        <td>
                            <button type="button" name="add" id="dynamic-ar"
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
                    <input type="{{ isset($inputType) ? $inputType : 'text' }}" name="timeline_name[]" value=""
                        placeholder="Input {{ $inputLabel }}"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) bg-red-700 @enderror"
                        required>

                    @isset($inputHelp)
                        <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
                    @endisset

                    @error($inputName)
                        <div class="hidden mt-1 text-sm text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </td>
                <td>
                    <input type="datetime-local" name="timeline_time[]" value=""
                        placeholder="Input {{ $inputLabel }}"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) bg-red-700 @enderror"
                        required>

                    @isset($inputHelp)
                        <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
                    @endisset

                    @error($inputName)
                        <div class="hidden mt-1 text-sm text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </td>
                <td>
                    <input type="datetime-local" name="timeline_time_end[]" value=""
                        placeholder="Input {{ $inputLabel }}"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md {{ isset($inputSize) ? $inputSize : '' }}  @error($value[2] ?? '') bg-red-700 @enderror"
                        required>

                    @isset($inputHelp)
                        <small class="block mt-1 text-gray-700">{!! $inputHelp !!}</small>
                    @endisset

                    @error($inputName)
                        <div class="hidden mt-1 text-sm text-red">
                            {{ $message }}
                        </div>
                    @enderror
                </td>
                <td>

                    <button type="button" name="add" id="dynamic-ar"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-white bg-white hover:bg-blue-600">Add
                        Subject
                    </button>
                </td>
                </td>
        @endif


        </tr>
    </table>


</div>

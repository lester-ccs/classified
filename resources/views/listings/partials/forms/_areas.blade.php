<div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
    <label for="area" class="control-label">Area</label>
    <select name="area_id" id="area" class="form-control">
        @foreach($areas as $country)
            <optgroup label="{{ $country->name }}">
                @foreach($country->children as $state)
                    {{--<optgroup label="{{ $state->name }}">--}}
                        {{--@foreach($state->children as $city)--}}
                            {{--<option value="{{ $city->id }}">{{ $city->name }}}})</option>--}}
                        {{--@endforeach--}}
                    {{--</optgroup>--}}
                    @foreach($country->children as $state)
                        @if (
                            isset($listing) && $listing->area->id == $state->id ||
                            !isset($listing) && $area->id == $state->id  && old('area_id') ||
                            old('area_id') == $state->id
                        )
                            <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option>
                        @else
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endif
                    @endforeach
                @endforeach
            </optgroup>
        @endforeach
    </select>

    @if ($errors->has('area_id'))
        <span class="help-block">
            {{ $errors->first('area_id') }}
        </span>
    @endif
</div>
<form class="form-default" role="form" action="{{ route('addresses.update', $address_data->id) }}" method="POST">
    @csrf
    <div class="p-3">
        
        <!-- Building No -->
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Building No')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" value="{{$address_data->building_no}}" placeholder="{{ translate('Building No')}}" rows="2" name="building_no" required />
            </div>
        </div>
        
        <!-- Street Name -->
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Street Name')}}</label>
            </div>
            <div class="col-md-10">
                <input class="form-control mb-3 rounded-0" placeholder="{{ translate('Street Name')}}" value="{{$address_data->street_name}}" name="street_name" required />
            </div>
        </div>


        <!-- Dictrict -->
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('District Name')}}</label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" name="state_id" id="edit_state"  data-live-search="true" required>
                    @foreach ($states as $key => $state)
                        <option value="{{ $state->id }}" @if($address_data->state_id == $state->id) selected @endif>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- City -->
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('City')}}</label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="city_id" required>
                    @foreach ($cities as $key => $city)
                        <option value="{{ $city->id }}" @if($address_data->city_id == $city->id) selected @endif>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        @if (get_setting('google_map') == 1)
            <!-- Google Map -->
            <div class="row mt-3 mb-3">
                <input id="edit_searchInput" class="controls" type="text" placeholder="Enter a location">
                <div id="edit_map"></div>
                <ul id="geoData">
                    <li style="display: none;">Full Address: <span id="location"></span></li>
                    <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                    <li style="display: none;">Country: <span id="country"></span></li>
                    <li style="display: none;">Latitude: <span id="lat"></span></li>
                    <li style="display: none;">Longitude: <span id="lon"></span></li>
                </ul>
            </div>
            <!-- Longitude -->
            <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname">{{ translate('Longitude')}}</label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_longitude" name="longitude" value="{{ $address_data->longitude }}" readonly="">
                </div>
            </div>
            <!-- Latitude -->
            <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname">{{ translate('Latitude')}}</label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_latitude" name="latitude" value="{{ $address_data->latitude }}" readonly="">
                </div>
            </div>
        @endif

        <!-- Postal code -->
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Zip code')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Postal Code')}}" value="{{ $address_data->postal_code }}" name="postal_code" value="" required>
            </div>
        </div>

        <!--additional_no-->
                        
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Additional No')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('Additional No')}}" value="{{ $address_data->additional_no }}" name="additional_no" value="" required>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Unit No')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('Unit No')}}" value="{{ $address_data->unit_no}}" name="unit_no" value="" required>
            </div>
        </div>

        <!-- Save button -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary rounded-0 w-150px">{{translate('Save')}}</button>
        </div>
    </div>
    
</form>
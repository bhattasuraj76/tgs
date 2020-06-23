<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-info" for="street_address">Street Address</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('street_address', $data->street_address)}}" name="street_address">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-info" for="city">Town/City</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('city', $data->city)}}" name="city">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-info" for="state">Province/State/District</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('state', $data->state)}}" name="state">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-info" for="country">Country</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('country', $data->country)}}" name="country">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="facebook_link">Facebook Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('facebook_link', $data->facebook_link)}}" name="facebook_link">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="instagram_link">Instagram Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('instagram_link', $data->instagram_link)}}" name="instagram_link">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="twitter_link">Twitter Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('twitter_link', $data->twitter_link)}}" name="twitter_link">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="pinterest_link">Pinterest Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('pinterest_link', $data->pinterest_link)}}" name="pinterest_link">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="skype_link">Skype Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('skype_link', $data->skype_link)}}" name="skype_link">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="linkedin_link">Linkedin Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('linkedin_link', $data->linkedin_link)}}" name="linkedin_link">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info" for="youtube_link">Youtube Link</label>
            <div class="controls">
                <input class="form-control" type="text" value="{{old('youtube_link', $data->youtube_link)}}" name="youtube_link">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-info" for="google_map">Google Map(Ifrmae <>)</label>
            <div class="controls">
                <textarea name="map_iframe" id="" cols="30" rows="5" class="form-control">{{ $data->map_iframe }}</textarea>
            </div>
        </div>
    </div>
</div>
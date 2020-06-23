<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-info" for="meta_title">Meta Title</label>
            <div class="controls">
                <input class="form-control" type="text" id="meta_title" name="meta_title" value="{{old('meta_title', $data->meta_title)}}">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-info" for="meta_keywords">Meta Keywords</label>
            <div class="controls">
                <input class="form-control" type="text" id="meta_keywords" name="meta_keywords" value="{{old('meta_keywords', $data->meta_keywords)}}">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-info" for="meta_description"> Meta Description </label>
            <div class="controls">
                <textarea class="form-control" rows="6" name="meta_description"> {{old('meta_description', $data->meta_description)}}</textarea>
            </div>
        </div>
    </div>
</div>
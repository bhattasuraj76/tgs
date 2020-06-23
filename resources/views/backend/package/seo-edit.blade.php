    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Meta Title</label>
        <div class="col-lg-10">
            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{$packageData->meta_title}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Meta Description</label>
        <div class="col-lg-10">
            <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{$packageData->meta_description}}</textarea>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Meta Keywords</label>
        <div class="col-lg-10">
            <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5">{{$packageData->meta_keywords}}</textarea>
        </div>
    </div>
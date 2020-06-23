<div class="form-group row">
    <label class="col-lg-2 col-form-label">Services Title</label>
    <div class="col-lg-10">
        <input type="text" name="service_megatitle" class="form-control" value="{{$packageData->service_megatitle}}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-lg-2 col-form-label">Includes Title</label>
    <div class="col-lg-10">
        <input type="text" name="includes_title" class="form-control" value="{{$packageData->includes_title}}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Includes</label>
    <div class="col-sm-10">
        <textarea name="includes" class="form-control texteditor" id="includes" rows="10">{{$packageData->includes}}</textarea>
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-lg-2 col-form-label">Exludes Title</label>
    <div class="col-lg-10">
        <input type="text" name="excludes_title" class="form-control" value="{{$packageData->excludes_title}}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Excludes</label>
    <div class="col-sm-10">
        <textarea name="excludes" class="form-control texteditor" id="excludes" rows="10">{{$packageData->excludes}}</textarea>
    </div>
</div>
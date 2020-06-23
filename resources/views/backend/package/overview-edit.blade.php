<div class="form-group row">
    <label class="col-sm-2 col-form-label">Short Description <br><small class="text-dark">(Not Applicable)</small></label>
    <div class="col-sm-10">
        <textarea name="short_description" id="short_description" class="form-control" rows="5">{{$packageData->short_description}}</textarea>
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Description </label>
    <div class="col-sm-10">
        <textarea name="description" id="description" class="form-control texteditor" rows="10">{{$packageData->description}}</textarea>
    </div>
</div>
<hr>
<div class="form-group row">
    <label for="highlights_title" class="col-sm-2 col-form-label">Highlights Title </label>
    <div class="col-sm-10">
        <input type="text" name="highlights_title" class="form-control" id="highlights_title" value="{{$packageData->highlights_title}}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="highlights">Highlights</label>
    <div class="col-sm-10">
        <textarea name="highlights" id="highlights" class="form-control texteditor" rows="10">{{$packageData->highlights}}</textarea>
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="packages_you_might_like">Similar Packages</label>
    <div class="col-lg-10">
        <select class="form-control select2" name="packages_you_might_like[]" id="packages_you_might_like" multiple>
            @php
            $packages_you_might_like = empty($packageData->packages_you_might_like) ? [] : unserialize($packageData->packages_you_might_like);
            @endphp
            @foreach($packages as $id => $title)
            <option value="{{ $id }}" @if(in_array($id, $packages_you_might_like)){{"selected"}}@endif> {{ $title }}</option>
            @endforeach
        </select>
    </div>
</div>
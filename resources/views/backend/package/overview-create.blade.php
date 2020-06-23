
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Short Description <br><small class="text-dark">(Not Applicable)</small></label>
        <div class="col-sm-10">
            <textarea name="short_description" id="short_description" class="form-control" rows="5"></textarea>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description </label>
        <div class="col-sm-10">
            <textarea name="description" id="description" class="form-control texteditor" rows="10"></textarea>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="highlights_title" class="col-sm-2 col-form-label">Highlights Title </label>
        <div class="col-sm-10">
            <input type="text" name="highlights_title" class="form-control" id="highlights_title">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="highlights">Highlights</label>
        <div class="col-sm-10">
            <textarea name="highlights" id="highlights" class="form-control texteditor" rows="10"></textarea>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="packages_you_might_like">Similar Packages</label>
        <div class="col-lg-10">
            <select class="form-control select2" name="packages_you_might_like[]" id="packages_you_might_like" multiple>
                @foreach($packages as $id=>$title)
                <option value="{{ $id }}"> {{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>

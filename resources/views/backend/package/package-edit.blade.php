    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Destination </label>
        <div class="col-sm-10">
            <select name="destination_id" class="form-control select2">
                @foreach($destinations as $id => $title)
                <option value="{{ $id }}" @if($packageData->destination_id == $id){{"selected"}}@endif>{{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Region </label>
        <div class="col-sm-10">
            <select name="region_id" class="form-control select2">
                @foreach($regions as $id => $title)
                <option value="{{ $id }}" @if($packageData->region_id == $id){{"selected"}}@endif>{{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Activities <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <select name="activity_id[]" class="form-control select2" style="width:100%!important;" multiple required>
                @foreach($activities as $id => $title)
                <option value="{{ $id }}" @if( in_array($id, $packageData->getActivitiesId()) ){{"selected"}} @endif>{{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Package Title <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" value="{{$packageData->title}}" id="title" required>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="slug" class="col-sm-2 col-form-label">Package Slug <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <input type="text" name="slug" class="form-control" value="{{$packageData->slug}}" id="slug" required>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price (USD) <span class="text-danger">*</span></label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="price" value="{{$packageData->price}}" required>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="group_size" class="col-sm-2 col-form-label">Group Size</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="group_size" value="{{$packageData->group_size}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="duration" class="col-sm-2 col-form-label">Trip Duration(days)</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="duration" value="{{$packageData->duration}}" min=0>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="max_altitude" class="col-sm-2 col-form-label">Maximum Altitude</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="max_altitude" value="{{$packageData->max_altitude}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="trip_start" class="col-sm-2 col-form-label">Trip Start Point</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="start_point" value="{{$packageData->start_point}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="trip_end" class="col-sm-2 col-form-label">Trip End Point</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="end_point" value="{{$packageData->end_point}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="difficulty" class="col-sm-2 col-form-label">Difficulty</label>
        <div class="col-sm-10">
            <select class="form-control" name="difficulty" id="difficulty">
                <option>Choose Difficulty </option>
                @foreach(config('package.difficulty') as $slug => $data)
                <option value="{{$slug}}" @if($packageData->difficulty == $slug){{"selected"}}@endif>{{$data['title']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="meals" class="col-sm-2 col-form-label">Meals</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="meals" value="{{$packageData->meals}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="accomodation" class="col-sm-2 col-form-label">Accomodation</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="accomodation" value="{{$packageData->accomodation}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="feature_it" class="col-lg-2 col-form-label">Feature Trip</label>
        <div class="col-lg-10">
            <label class="checkbox-inline">
                <input type="checkbox" name="is_featured" id="feature_it" value="1" @if($packageData->is_featured == 1 ){{"checked"}}@endif>
            </label>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="position">Display Order</label>
        <div class="col-sm-2">
            <input type="number" min=1 class="form-control" name="position" value="{{$packageData->position}}">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Status </label>
        <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="status" value="published" @if($packageData->status == 'published'){{"checked"}}@endif>
                Active
            </label>
            <label class="radio-inline">
                <input type="radio" name="status" value="draft" @if($packageData->status == 'draft'){{"checked"}}@endif>
                Inactive
            </label>
        </div>
    </div>
<!-- map start -->
<div class="form-group row">
    <label for="map_title" class="col-lg-2 col-form-label"> Section Title</label>
    <div class="col-lg-10">
        <input type="text" name="map_title" class="form-control" id="map_title" value="{{ old('map_title') }}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-lg-2 col-form-label">Map Image</label>
    <div class="col-lg-10">
        <div class="input-group {{ $errors->has('map') ? ' is-invalid' : '' }}">
            <span class="input-group-btn">
                <a id="blogImage" data-input="image" data-preview="holder" class="filemanager btn btn-info w-200 text-white">
                    Choose <i class="far fa-image text-white"></i>
                </a>
            </span>
            <input type="text" class="form-control" id="image" name="map" value="{{ old('image') }}" />
        </div>
        <p> Note : max-width=400px and min-height=350px</p>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid max-h-300 border-1" id="holder">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group row">
    <label for="map_alt" class="col-lg-2 col-form-label">Map Alt Text</label>
    <div class="col-lg-10">
        <input type="text" name="map_alt" class="form-control" id="map_alt" value="{{ old('map_alt') }}">
    </div>
</div>

<hr>
<div class="float-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-route-btn">
            Add a route
        </button>
    </div>
</div>

<div class="clearfix"></div>
<div class="routes__wrapper">
    <div class="routes first-route">
        <div class="routesh4 addmoreh4">
            <h4 data-toggle="collapse" data-target="#rcontainer0">Route 1</h4>
        </div>
        <div id="rcontainer0">
            <div class="form-group row">
                <label for="title" class="col-lg-2 col-form-label"> Title</label>
                <div class="col-lg-10">
                    <input type="text" name="map_route_title[]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Color (hash)</label>
                <div class="col-lg-10">
                    <input type="text" name="map_route_color[]" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- map end -->
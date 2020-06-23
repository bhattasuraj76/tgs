<!-- map start -->
<div class="form-group row">
    <label for="map_title" class="col-lg-2 col-form-label"> Section Title</label>
    <div class="col-lg-10">
        <input type="text" name="map_title" class="form-control" id="map_title" value="{{ $regionData->map_title }}">
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-lg-2 col-form-label">Map</label>
    <div class="col-lg-10">
        <div class="input-group {{ $errors->has('map') ? ' is-invalid' : '' }}">
            <span class="input-group-btn">
                <a id="blogImage" data-input="image" data-preview="holder" class="filemanager btn btn-info w-200 text-white">
                    Choose <i class="far fa-image text-white"></i>
                </a>
            </span>
            <input type="text" class="form-control" id="image" name="map" value="{{  $regionData->map }}" />
        </div>
        <p> Note : max-width=400px and min-height=350px</p>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid max-h-300 border-1" id="holder" src="@if(!empty($regionData->map)){{  asset($regionData->map)  }}@endif">
                @if(!empty($regionData->map))
                <br>
                <a href="{{ route('admin.region.map.destroy', $regionData->id) }}" class="btn btn-danger m-t-5 text-white" data-image="image" data-holder="holder" onclick="return ajaxDeletePicture(event, this);">Delete</a>
                @endif
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group row">
    <label for="map_alt" class="col-lg-2 col-form-label">Map Alt</label>
    <div class="col-lg-10">
        <input type="text" name="map_alt" class="form-control" id="map_alt" value="{{  $regionData->map_alt }}">
    </div>
</div>
<!-- map end -->


<!-- route start -->
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
    @if(!empty($regionData->map_routes))

    <?php
    $routesData = unserialize($regionData->map_routes);
    $count = count($routesData);
    ?>

    @foreach($routesData as $key => $route)
    <?php
    $datatoggle = "collapse";
    $areaexpanded = "false";
    $class = "collapse";
    if ($key == $count - 1) {
        $datatoggle = "collapse";
        $areaexpanded = "true";
        $class = "collapse show";
    }
    ?>

    <div class="routes addmoresection">
        <div class="routesh4 addmoreh4">
            <h4 data-toggle="{{$datatoggle}}" data-target="#rcontainer{{$key}}" aria-expanded="{{$areaexpanded}}">Route {{$count}}</h4>
            <?php
            $routeName = $route['title'];
            $url = 'admin/region/' . $regionData->id . '/' . 'deleteSingleRoute?title=' . $route['title'];
            ?>
            <a href="{{url($url)}}" class="close remove-route removeitem" onclick="return ajaxDeleteItem(event, this);">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div id="rcontainer{{$key}}" class="{{$class}}">
            <div class="form-group row">
                <label for="title" class="col-lg-2 col-form-label"> Title</label>
                <div class="col-lg-10">
                    <input type="text" name="map_route_title[]" class="form-control" value="{{$route['title']}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Color (hash)</label>
                <div class="col-lg-10">
                    <input type="text" name="map_route_color[]" class="form-control" value="{{$route['color']}}">
                </div>
            </div>
        </div>
    </div>
    <?php $count = $count - 1; ?>
    @endforeach

    @else
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

    @endif

</div>
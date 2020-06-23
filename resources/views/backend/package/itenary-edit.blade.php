<div class="m-t-40">
    <div class="form-group row ">
        <label class="col-sm-2 col-form-label">Itinerary Title</label>
        <div class="col-sm-10">
            <input class="form-control" name="itenary_megatitle" type="text" value="{{$packageData->itenary_megatitle}}">
        </div>
    </div>
    <hr>

    <div class="float-right">
        <div class="btn-group">
            <button type="button" class="btn btn-primary add-more-itenary-btn">
                Add More
            </button>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="itenaries__wrapper">
        @if(!$packageData->itenaries->isEmpty())
        @php $count = count($packageData->itenaries); @endphp

        @foreach($packageData->itenaries()->orderBy('position', 'desc')->get() as $key => $itenaryData)
        @php
        $datatoggle = "collapse";
        $areaexpanded = "false";
        $class = "collapse";
        if (1 == $count) {
        $datatoggle = "collapse";
        $areaexpanded = "true";
        $class = "collapse show";
        }
        @endphp

        <div class="itenaries">
            <div class="itenariesh4 addmoreh4">
                <h4 data-toggle="{{$datatoggle}}" data-target="#icontainer{{$itenaryData->id}}" aria-expanded="{{$areaexpanded}}">Day {{$count}}</h4>
                <a href="{{route('admin.package.itenary.destroy',[$packageData->id, $itenaryData->id])}}" class="close remove-itenary removeitem" onclick="return ajaxDeleteItem(event, this);">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div id="icontainer{{$itenaryData->id}}" class="{{$class}}">
                <input type="hidden" name="itenary_id[]" value="{{$itenaryData->id}}">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No of Day</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_position[]" type="number" min="1" value="{{$itenaryData->position}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_title[]" type="text" value="{{$itenaryData->title}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control texteditor" name="itenary_description[]" id="itenarytexteditor{{$key}}" rows="5">{{$itenaryData->description}}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Accomodation</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_accomodation[]" type="text" value="{{$itenaryData->accomodation}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="itenary_meals" class="col-sm-2 col-form-label">Meals</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="itenary_meals[]">
                            <option value="">Choose Meals </option>
                            @foreach(config('package.meals') as $slug => $title)
                            <option value="{{$slug}}" @if($itenaryData->meals == $slug){{"selected"}}@endif>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Distance</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_distance[]" type="text" value="{{$itenaryData->distance}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ascent</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_ascent[]" type="text" value="{{$itenaryData->ascent}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descent</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_descent[]" type="text" value="{{$itenaryData->descent}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_time[]" type="text" value="{{$itenaryData->time}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gps Data</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_gps_data[]" type="text" value="{{$itenaryData->gps_data}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Feature Image</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a data-input="ieimage{{$count}}" data-preview="ieimage{{$count}}holder" class="filemanager btn btn-info w-200 text-white">
                                    Choose <i class="far fa-image text-white"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control" id="ieimage{{$count}}" name="itenary_image[]" value="{{ $itenaryData->image }}" />
                        </div>
                        <p>Recommended : width=550px and height=350px</p>


                        <div class="row">
                            <div class="col-sm-6">
                                <img src="@if(!empty($itenaryData->image)){{asset($itenaryData->image)}} @endif" class="img-fluid max-h-300" id="ieimage{{$count}}holder">
                                @if(!empty($itenaryData->image))
                                <br>
                                <a href="{{ route('admin.package.itenary.image.destroy',[ $packageData->id, $itenaryData->id]) }}" class="btn btn-danger m-t-5 text-white" onclick="return ajaxDeleteItem(event, this);">Delete</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Feature Image Alt</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_image_alt[]" type="text" value="{{$itenaryData->image_alt}}">
                    </div>
                </div>
            </div>
        </div>
        @php $count = $count - 1; @endphp

        @endforeach

        @else

        <div class="itenaries first-itenary">
            <div class="itenariesh4 addmoreh4">
                <h4 data-toggle="collapse" data-target="#icontainer0">Day 1</h4>
            </div>
            <div id="icontainer0">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No of Day</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_position[]" type="number" min="1">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_title[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control texteditor" name="itenary_description[]" id="itenarytexteditor0" rows="5"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Accomodation</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_accomodation[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="itenary_meals" class="col-sm-2 col-form-label">Meals</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="itenary_meals[]">
                            <option value="">Choose Meals</option>
                            {!! $chooseMealsHtml !!}
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Distance</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_distance[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ascent</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_ascent[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descent</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_descent[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_time[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gps Data</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_gps_data[]" type="text">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Feature Image</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a data-input="iimage0" data-preview="iimage0holder" class="filemanager btn btn-info w-200 text-white">
                                    Choose <i class="far fa-image text-white"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control" id="iimage0" name="itenary_image[]" />
                        </div>
                        <p>Recommended : width=550px and height=350px</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-fluid max-h-300" id="iimage0holder">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Feature Image Alt</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="itenary_image_alt[]" type="text">
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>
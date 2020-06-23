<div id="datesPriceDiv">
    @if(!$data->isEmpty())

    @php
    $count = count($data);
    @endphp

    @foreach($data as $key => $datesPriceData)

    @php
    $datatoggle = "collapse";
    $areaexpanded = "false";
    $class = "collapse";
    $startDate = !empty($datesPriceData->start_date) ? $datesPriceData->start_date->toDateString() : null;
    $endDate = !empty($datesPriceData->end_date) ? $datesPriceData->end_date->toDateString() : null;
    $tripCode = !empty($datesPriceData->trip_code) ? $datesPriceData->trip_code : null;

    if (1 == $count) {
    $datatoggle = "collapse";
    $areaexpanded = "true";
    $class = "collapse show";
    }
    @endphp

    <div class="datesprice">
        <div class="datespriceh4 addmoreh4">
            <h4 data-toggle="{{$datatoggle}}" data-target="#dcontainer{{$datesPriceData->id}}" aria-expanded="{{$areaexpanded}}">
                Dates & Price {{$count}} | Trip Code : {{$tripCode}}
            </h4>
            <a href="{{route('admin.package.datesprice.destroy',[$packageData->id, $datesPriceData->id])}}" class="close remove-datesprice removeitem" onclick="return ajaxDeleteItem(event, this);">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div id="dcontainer{{$datesPriceData->id}}" class="{{$class}}">
            <input type="hidden" name="datesprice_id[]" value="{{$datesPriceData->id}}">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip Start Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control calendar" name="trip_start_date[]" value="{{$startDate}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip End Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control calendar" name="trip_end_date[]" value="{{$endDate}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="trip_price[]" value="{{$datesPriceData->price}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="trip_code[]" value="{{$datesPriceData->trip_code}}">
                </div>
            </div>
            <hr>
            <label class="col-sm-2 col-form-label">Trip Note</label>
            <div class="col-sm-10">
                <input type="file" name="trip_note[]" class="form-control" />
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">More Information</label>
                <div class="col-sm-10">
                    <textarea name="trip_description[]" id="datepricetexteditor{{$key}}" class="form-control texteditor" rows="10">{{$datesPriceData->description}}</textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="datesprice_status[]">
                        @foreach(config('package.booking_status') as $slug => $title)
                        <option value="{{$slug}}" @if($datesPriceData->status == $slug){{"selected"}}@endif>{{$title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @php $count = $count - 1; @endphp

    @endforeach

    @else
    <div class="datesprice first-datesprice">
        <div class="datespriceh4 addmoreh4">
            <h4 data-toggle="collapse" data-target="#dcontainer0">Date & Price 1</h4>
        </div>
        <div id="dcontainer0">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip Start Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control calendar" name="trip_start_date[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip End Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control calendar" name="trip_end_date[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="trip_price[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip Code</label>
                <div class="col-sm-10">
                    <input class="form-control" name="trip_code[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trip Note</label>
                <div class="col-sm-10">
                    <input type="text" name="trip_note[]" class="form-control" />
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">More Information</label>
                <div class="col-sm-10">
                    <textarea name="trip_description[]" id="datepricetexteditor0" class="form-control texteditor" rows="10"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Booking Status</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="trip_status[]">
                        @foreach(config('package.booking_status') as $slug => $title)
                        <option value="{{$slug}}">{{$title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>

<script>
    loadDatepicker();
    loadTextEditor();
    loadFileManager();
</script>
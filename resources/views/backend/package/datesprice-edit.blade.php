<div class="float-right">
    <div class="d-inline" style="float:left;margin-right:20px;">
        <label for="" style="padding-top: 10px;">Filter By : </label>
    </div>
    <div class="d-inline" style="float:left;margin-right:20px;">
        <select name="" id="selectYear" class="form-control">
            <option value="all">All Years</option>
            <?php for ($i = date('Y'); $i <= (date('Y') + 2); $i++) { ?>
                <option value="{{$i}}">{{$i}}</option>
            <?php } ?>
        </select>
    </div>
    <div class="d-inline" style="float:left;margin-right:20px;">
        <?php
        $monthsArray = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ]
        ?>
        <select name="month" id="selectMonth" class="form-control">
            <option value="all">All Months</option>
            <?php for ($i = 1; $i <= count($monthsArray); $i++) { ?>
                <option value="{{$i}}">{{$monthsArray[$i-1]}}</option>
            <?php } ?>
        </select>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-datesprice-btn">
            Add More
        </button>
    </div>
</div>

<div class="clearfix"></div>

<div class="datesprice__wrapper" id="datesPriceDiv">
    @if(!$packageData->datesprice->isEmpty())

    @php
    $count = count($packageData->datesprice);
    @endphp

    @foreach($packageData->datesprice as $key => $datesPriceData)

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
                <label class="col-lg-2 col-form-label">Trip Start Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control calendar" name="trip_start_date[]" value="{{$startDate}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip End Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control calendar" name="trip_end_date[]" value="{{$endDate}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Price</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="trip_price[]" value="{{$datesPriceData->price}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip Code</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="trip_code[]" value="{{$datesPriceData->trip_code}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip Note</label>
                <div class="col-lg-6">
                    <input type="file" name="trip_note[]" class="form-control" />
                </div>
                @if(!empty($datesPriceData->trip_note))
                <div class="col-lg-4">
                    <a href="{{asset('public/uploads/packages/pdfs/'.$datesPriceData->trip_note)}}" target="_BLANK" style="margin-right:10px;" class="btn btn-warning m-t-5 text-white">View File</a>
                    <a href="{{route('admin.package.datesprice.pdf.destroy', [$packageData->id, $datesPriceData->id ])}}" class="btn btn-danger m-t-5 text-white" onclick="return ajaxDeleteItem(event, this);">Delete</a>
                </div>
                @endif
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">More Information</label>
                <div class="col-lg-10">
                    <textarea name="trip_description[]" id="datepricetexteditor{{$key}}" class="form-control texteditor" rows="10">{{$datesPriceData->description}}</textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Status</label>
                <div class="col-lg-10">
                    <select type="text" class="form-control" name="datesprice_status[]">
                        <option value="">Choose Status</option>
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
                <label class="col-lg-2 col-form-label">Trip Start Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control calendar" name="trip_start_date[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip End Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control calendar" name="trip_end_date[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Price</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="trip_price[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip Code</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="trip_code[]">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Trip Note</label>
                <div class="col-lg-10">
                    <input type="file" name="trip_note[]" class="form-control" />

                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">More Information</label>
                <div class="col-lg-10">
                    <textarea name="trip_description[]" id="datepricetexteditor0" class="form-control texteditor" rows="10"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Booking Status</label>
                <div class="col-lg-10">
                    <select type="text" class="form-control" name="trip_status[]">
                        <option value="">Choose Status</option>
                        {!! $bookingStatusHtml !!}
                    </select>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
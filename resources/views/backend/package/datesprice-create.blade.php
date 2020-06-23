<div class="form-group row ">
    <label class="col-lg-2 col-form-label">Date & Price Title</label>
    <div class="col-lg-10">
        <input class="form-control" name="datesprice_megatitle" type="text">
    </div>
</div>
<hr>
<div class="float-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-datesprice-btn">
            Add More
        </button>
    </div>
</div>

<div class="clearfix"></div>
<div class="datesprice__wrapper">
<div class="datesprice first-datesprice">
    <div class="datespriceh4 addmoreh4">
        <h4 data-toggle="collapse" data-target="#dcontainer0">Date & Price 1</h4>
    </div>
    <div id="dcontainer0">
        <div class="form-group row">
            <label class="col-lg-2 col-form-label">Trip Start Date</label>
            <div class="col-lg-10">
                <input class="form-control calendar" name="trip_start_date[]">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label">Trip End Date</label>
            <div class="col-lg-10">
                <input class="form-control calendar" name="trip_end_date[]">
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
                <input type="file" name="trip_note[]" class="form-control">
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
</div>
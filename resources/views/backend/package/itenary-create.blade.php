<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Itinerary Title</label>
    <div class="col-sm-10">
        <input class="form-control" name="itenary_megatitle" type="text">
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
                            <a id="iImage0" data-input="iimage0" data-preview="iimage0holder" class="filemanager btn btn-info w-200 text-white">
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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Feature Image Alt</label>
                <div class="col-sm-10">
                    <input class="form-control" name="itenary_image_alt[]" type="text">
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<div class="btn-group float-right">
    <button type="button" class="btn btn-primary add-more-working-day-btn">
        + Add a working day
    </button>
</div>

<div class="clearfix"></div>

<div class="working-days__wrapper">
    <div class="working-days">
        <div class="addmoreh4">
            <h4 data-toggle="collapse" data-target="#wdcontainer0">Working Day 1</h4>
        </div>
        <div id="wdcontainer0">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Day <span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <select class="form-control" name="working_day[day][]">
                        {!! $selectDaysHtml !!}
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Office End Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[office_end_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Office End Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[office_end_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Break Start Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[break_start_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Break End Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[break_end_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Max Quotas </label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[max_quotas][]" class="form-control" min="1">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Allocation Time(mins)</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[allocation_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Position</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[position][]" class="form-control" value="1" min="1">
                </div>
            </div>
        </div>
    </div>
</div>
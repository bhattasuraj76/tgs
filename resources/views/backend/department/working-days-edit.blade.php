<div class="btn-group float-right">
    <button type="button" class="btn btn-primary add-more-working-day-btn">
        + Add a working day
    </button>
</div>

<div class="clearfix"></div>
<div class="working-days__wrapper">

    @if(!$data->workingdays->isEmpty())
    @php $count = count($data->workingdays); @endphp

    @foreach($data->workingdays()->orderBy('position', 'desc')->get() as $key => $workingDay)
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

    <div class="working-days">
        <div class="addmoreh4">
            <h4 data-toggle="{{$datatoggle}}" data-target="#wdcontainer{{$key}}" aria-expanded="{{$areaexpanded}}">Working Day {{$count}} | {{ucfirst($workingDay->day)}}</h4>
            <a href="{{route('admin.department.working_day.destroy',[$data->id, $workingDay->id])}}" class="close removeitem js-destroy-item">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div id="wdcontainer{{$key}}" class="{{$class}}">
            <input type="hidden" name="working_day[id][]" value="{{$workingDay->id}}">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Day<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    <select name="working_day[day][]" class="form-control">
                        @php
                        $days = ['' => 'Select Day', 'sunday' => 'Sunday', 'monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday'];
                        @endphp
                        @foreach($days as $name => $dispalyName)
                        <option value="{{$name}}" @if($name==$workingDay->day){{"selected"}}@endif>{{$dispalyName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Office Start Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[office_start_time][]" class="form-control" value="{{$workingDay->office_start_time}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Office End Time</label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[office_end_time][]" class="form-control" value="{{$workingDay->office_end_time}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Break Start Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[break_start_time][]" class="form-control" value="{{$workingDay->break_start_time}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Break End Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[break_end_time][]" class="form-control" value="{{$workingDay->break_end_time}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Max Quotas </label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[max_quotas][]" class="form-control" value="{{$workingDay->max_quotas}}" min="1">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Allocation Time (mins)</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[allocation_time][]" class="form-control" value="{{$workingDay->allocation_time}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Position</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[position][]" class="form-control" value="{{$workingDay->position}}" min="1">
                </div>
            </div>
        </div>
    </div>
    @php $count = $count - 1; @endphp

    @endforeach

    @else
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
                <label class="col-lg-2 col-form-label">Office Start Time </label>
                <div class="col-lg-10">
                    <input type="time" name="working_day[office_start_time][]" class="form-control">
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
                <label class="col-lg-2 col-form-label">Allocation Time (mins)</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[allocation_time][]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Display Order</label>
                <div class="col-lg-10">
                    <input type="number" name="working_day[position][]" class="form-control" value="1" min="1">
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
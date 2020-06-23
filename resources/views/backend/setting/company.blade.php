<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Office Start Time <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('office_start_time')){{'is-invalid'}}@endif" type="time" value="{{old('office_start_time', $data->office_start_time)}}" name="office_start_time">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Office End Time <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('office_end_time')){{'is-invalid'}}@endif" type="time" value="{{old('office_end_time', $data->office_end_time)}}" name="office_end_time">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Break Start Time <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('break_start_time')){{'is-invalid'}}@endif" type="time" value="{{old('break_start_time', $data->break_start_time)}}" name="break_start_time">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Break End Time <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('break_end_time')){{'is-invalid'}}@endif" type="time" value="{{old('break_end_time', $data->break_end_time)}}" name="break_end_time">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Max Quotas <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('max_quotas')){{'is-invalid'}}@endif" type="number" min="1" value="{{old('max_quotas', $data->max_quotas)}}" name="max_quotas">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-info">Allocation Time (mins) <span class="text-danger">*</span></label>
            <div class="controls">
                <input class="form-control @if($errors->has('allocation_time')){{'is-invalid'}}@endif" type="number" min="1" value="{{old('allocation_time', $data->allocation_time)}}" name="allocation_time">
            </div>
        </div>
    </div>
</div>
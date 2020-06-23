<div class="form-group row">
    <label class="col-sm-2 col-form-label"> Region </label>
    <div class="col-sm-10">
        <select name="region_id" class="form-control select2">
            @foreach($regions as $id => $title)
            <option value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"> Activities</label>
    <div class="col-sm-10">
        <select name="activity_id[]" class="form-control" id="activities" style="width:100%!important;" multiple>
            @foreach($activities as $id => $title)
            <option value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
    </div>
</div>
<hr>

<script>
    loadSelect2();
    $('#activities').select2({
        placeholder: "Select Activities",
        allowClear: true
    });
</script>
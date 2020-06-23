<div class="form-group row">
    <label for="packages_megatitle" class="col-lg-2 col-form-label"> Section Title</label>
    <div class="col-lg-10">
        <input type="text" name="packages_megatitle" class="form-control" id="packages_megatitle" value="{{ old('packages_megatitle') }}">
    </div>
</div>

<hr>
<div class="form-group row">
    <label for="packages_description" class="col-lg-2 col-form-label">Section Description </label>
    <div class="col-lg-10 {{ $errors->has('description') ? ' is-invalid' : '' }} ">
        <textarea name="packages_description" id="packages_description" class="form-control texteditor" rows="10">{{ old('packages_description') }}</textarea>
    </div>
</div>
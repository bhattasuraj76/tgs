

<!-- thumbnail section start -->
<hr>
<div class="form-group row">
    <label class="col-lg-2 col-form-label">Menu Thumbnail</label>
    <div class="col-lg-10">
        <div class="input-group">
            <span class="input-group-btn">
                <a data-input="thumbnail" data-preview="tholder" class="filemanager btn btn-info w-200 text-white">
                    Choose <i class="far fa-image text-white"></i>
                </a>
            </span>
            <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" />
        </div>
        <p> Note : max-width=400px and min-height=400px</p>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid max-h-300 border-1" id="tholder">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group row">
    <label for="thumbnail_alt" class="col-lg-2 col-form-label"> Menu Thumbnail Alt</label>
    <div class="col-lg-10">
        <input type="text" name="thumbnail_alt" class="form-control" id="thumbnail_alt" value="{{ old('thumbnail_alt') }}">
    </div>
</div>
<!-- thumnail section end -->


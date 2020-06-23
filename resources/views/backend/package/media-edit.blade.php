    <!-- feature image start -->
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Feature Image</label>
        <div class="col-lg-10">
            <div class="input-group">
                <span class="input-group-btn">
                    <a data-input="image" data-preview="holder" class="filemanager btn btn-info w-200 text-white">
                        Choose <i class="far fa-image text-white"></i>
                    </a>
                </span>
                <input type="text" class="form-control" id="image" name="image" value="{{ $packageData->image }}" />
            </div>
            <p> Note : max-width=800px and min-height=500px</p>
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-fluid max-h-300 border-1" id="holder" src="@if(!empty($packageData->image)){{asset($packageData->image)}}@endif">
                    @if(!empty($packageData->image))
                    <br>
                    <a href="{{ route('admin.package.image.destroy', $packageData->id) }}" class="btn btn-danger m-t-5 text-white" data-image="image" data-holder="holder" onclick="return ajaxDeletePicture(event, this);">Delete</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="image_alt" class="col-lg-2 col-form-label"> Feature Image Alt</label>
        <div class="col-lg-10">
            <input type="text" name="image_alt" class="form-control" id="image_alt" value="{{ $packageData->image_alt }}">
        </div>
    </div>
    <!-- feature image end -->

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
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ $packageData->thumbnail }}" />
            </div>
            <p> Note : max-width=400px and min-height=400px</p>
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-fluid max-h-300 border-1" id="tholder" src="@if(!empty($packageData->thumbnail)){{asset($packageData->thumbnail)}}@endif">
                    @if(!empty($packageData->thumbnail))
                    <br>
                    <a href="{{ route('admin.package.thumbnail.destroy', $packageData->id) }}" class="btn btn-danger m-t-5 text-white" data-image="thumbnail" data-holder="tholder" onclick="return ajaxDeletePicture(event, this);">Delete</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label for="thumbnail_alt" class="col-lg-2 col-form-label"> Menu Thumbnail Alt</label>
        <div class="col-lg-10">
            <input type="text" name="thumbnail_alt" class="form-control" id="thumbnail_alt" value="{{ $packageData->thumbnail_alt }}">
        </div>
    </div>
    <!-- thumnail section end -->
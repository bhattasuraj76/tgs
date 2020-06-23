<!-- photo seciton start -->
<div class="float-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-photo-btn">
            Add a photo
        </button>
    </div>
</div>

<div class="clearfix"></div>
<div class="photos__wrapper">

    <div class="photos first-photo">
        <div class="photosh4 addmoreh4">
            <h4 data-toggle="collapse" data-target="#container0" aria-expanded="true">Photos 1</h4>
        </div>
        <div id="container0" class="collapse show">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Image Alt</label>
                <div class="col-sm-10">
                    <input type="text" name="photo_title[]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image Caption</label>
                <div class="col-sm-10 ">
                    <textarea name="photo_description[]" class="form-control" id="phototexteditor" rows="3"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Display Order</label>
                <div class="col-sm-10">
                    <input type="number" name="photo_position[]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="photoimage0" data-preview="iimage0holder" class="filemanager btn btn-info w-200 text-white">
                                Choose <i class="far fa-image text-white"></i>
                            </a>
                        </span>
                        <input type="text" class="form-control" id="photoimage0" name="photo_image[]" />
                    </div>
                    <p>Recommended : width=550px and height=350px</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="img-fluid max-h-300" id="iimage0holder">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- photo section end -->
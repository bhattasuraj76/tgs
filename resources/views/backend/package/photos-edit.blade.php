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
      @php
      if($packageData->photos->isNotEmpty()){
      $count = $packageData->photos()->count();

      foreach($packageData->photos as $key => $photoData){
      $datatoggle = "collapse";
      $areaexpanded = "false";
      $class = "collapse";
      if (1 == $count) {
      $datatoggle = "collapse";
      $areaexpanded = "true";
      $class = "collapse show";
      }

      @endphp

      <div class="photos">
          <div class="photosh4 addmoreh4">
              <h4 data-toggle="{{$datatoggle}}" data-target="#pcontainer{{$key}}" aria-expanded="{{$areaexpanded}}">Photo {{$count}}</h4>
              <a href="{{route('admin.package.photo.destroy', [$packageData->id, $photoData->id])}}" class="close remove-photo removeitem" onclick="return ajaxDeleteItem(event, this);">
                  <span aria-hidden="true">&times;</span>
              </a>
          </div>
          <div id="pcontainer{{$key}}" class="{{$class}}">
              <input type="hidden" name="photo_id[]" value="{{$photoData->id}}">
              <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Image Alt</label>
                  <div class="col-sm-10">
                      <input type="text" name="photo_title[]" class="form-control" value="{{$photoData->title}}">
                  </div>
              </div>
              <hr>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Image Caption</label>
                  <div class="col-sm-10 ">
                      <textarea name="photo_description[]" class="form-control" rows="3">{{$photoData->description}}</textarea>
                  </div>
              </div>
              <hr>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Display Order</label>
                  <div class="col-sm-10">
                      <input type="number" name="photo_position[]" class="form-control" value="{{$photoData->position}}">
                  </div>
              </div>
              <hr>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Upload Image</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <a data-input="photoimage{{$key}}" data-preview="iimage{{$key}}holder" class="filemanager btn btn-info w-200 text-white">
                                  Choose <i class="far fa-image text-white"></i>
                              </a>
                          </span>
                          <input type="text" class="form-control" id="photoimage{{$key}}" name="photo_image[]" value="{{$photoData->image}}" />
                      </div>
                      <p>Recommended : width=550px and height=350px</p>
                      @if(!empty($photoData->image))
                      <div class="row">
                          <div class="col-sm-4">
                              <img class="img-fluid max-h-300" id="iimage{{$key}}holder" src="{{asset($photoData->image) }}">
                          </div>
                      </div>
                      @endif
                  </div>
              </div>
          </div>
      </div>
      @php
      $count = $count - 1;
      }
      }else{
      @endphp

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
                      <textarea name="photo_description[]" class="form-control" id="phototexteditor0" rows="3"></textarea>
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

      @php
      }
      @endphp
  </div>
  <!-- photo section end -->
  <div class="form-group row">
      <label for="remarks" class="col-lg-2 col-form-label">First Name </label>
      <div class="col-lg-10">
          <input type="text" class="form-control" value="{{ $data->first_name }}">
      </div>
  </div>
  <hr>
  <div class="form-group row">
      <label class="col-lg-2 col-form-label">Last Name </label>
      <div class="col-lg-10">
          <input type="text" class="form-control" value="{{ $data->last_name }}">
      </div>
  </div>
  <hr>
  <div class="form-group row">
      <label class="col-lg-2 col-form-label">Email </label>
      <div class="col-lg-10">
          <input type="email" class="form-control" value="{{ $data->email }}">
      </div>
  </div>
  <hr>
  <div class="form-group row">
      <label class="col-lg-2 col-form-label">Mobile No. </label>
      <div class="col-lg-10">
          <input type="text" class="form-control" value="{{ $data->phone }}">
      </div>
  </div>
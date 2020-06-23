 <div class="form-group row">
     <label class="col-lg-2 col-form-label">Token ID </label>
     <div class="col-lg-10">
         <input type="text" class="form-control" value="{{ $data->id }}">
     </div>
 </div>
 <hr>
 <div class="form-group row">
     <label class="col-lg-2 col-form-label">Department </label>
     <div class="col-lg-10">
         <input type="text" class="form-control" value="{{ $data->department_name }}">
     </div>
 </div>
 <hr>
 <div class="form-group row">
     <label for="remarks" class="col-lg-2 col-form-label">Date </label>
     <div class="col-lg-10">
         <input type="text" class="form-control" value="{{ $data->date }}">
     </div>
 </div>
 <hr>
 <div class="form-group row">
     <label class="col-lg-2 col-form-label">Time </label>
     <div class="col-lg-10">
         <input type="time" class="form-control" value="{{ $data->time_slot }}">
     </div>
 </div>
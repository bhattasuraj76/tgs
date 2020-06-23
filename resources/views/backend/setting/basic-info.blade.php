 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="site_name">Site Name <span class="text-danger">*</span></label>
             <div class="controls">
                 <input class="form-control @if($errors->has('site_name')){{'is-invalid'}}@endif" type="text" id="site_name" name="site_name" value="{{old('site_name', $data->site_name)}}">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="slogan">Slogan</label>
             <div class="controls">
                 <input class="form-control" type="text" id="slogan" name="slogan" value="{{old('slogan', $data->slogan)}}">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="time_zone">Time Zone</label>
             <div class="controls">
                 <select name="time_zone" class="form-control">
                     <option value="">Select Timezone</option>
                     @foreach($timezones as $d)
                     <option value="{{$d}}" @if(old('time_zone', $data->time_zone) == $d){{"selected"}}@endif>{{$d}}</option>
                     @endforeach
                 </select>
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="office_time">Office Time</label>
             <div class="controls">
                 <input class="form-control" type="text" id="office_time" name="office_time" value="{{old('office_time', $data->office_time)}}">
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="primary_email">Primary Email <span class="text-danger">*</span></label>
             <div class="controls">
                 <input class="form-control @if($errors->has('primary_email')){{'is-invalid'}}@endif" type="text" value="{{old('primary_email', $data->primary_email)}}" name="primary_email">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="secondary_email">Secondary Email</label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('secondary_email', $data->secondary_email)}}" name="secondary_email">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="postal_code">Postal Code</label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('postal_code', $data->postal_code)}}" name="postal_code">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="fax_no">Fax No</label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('fax_no', $data->fax_no)}}" name="fax_no">
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="established_year">Year Established </label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('established_year', $data->established_year)}}" name="established_year">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="phone1">Office Phone No <span class="text-danger">*</span></label>
             <div class="controls">
                 <input class="form-control @if($errors->has('phone1')){{'is-invalid'}}@endif" type="text" value="{{old('phone1', $data->phone1)}}" name="phone1">
             </div>
         </div>
     </div>

 </div>
 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="employee1">Contact Name</label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('employee1', $data->employee1)}}" name="employee1">
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label class="text-info" for="mobile1">Mobile No</label>
             <div class="controls">
                 <input class="form-control" type="text" value="{{old('mobile1', $data->mobile1)}}" name="mobile1">
             </div>
         </div>
     </div>
     <!-- <div class="col-md-12">
        <div class="form-group">
            <label class="text-info" for="about_us">About Us(Footer Placement)</label>
            <div class="controls">
                <textarea class="form-control" rows="6" id="about_us" name="about_us"> {{old('about_us', $data->about_us)}}</textarea>
            </div>
        </div>
    </div> -->

 </div>
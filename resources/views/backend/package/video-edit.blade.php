    <!-- video section start -->
    <!-- <div class="float-right">
        <div class="btn-group">
            <button type="button" class="btn btn-primary add-more-video-btn" disabled>
                Add a video
            </button>
        </div>
    </div>
    <div class="clearfix"></div> -->
    <div class="videos__wrapper">

        @php

        if($packageData->videos->isNotEmpty()){
        $count = $packageData->videos()->count();

        foreach($packageData->videos as $key => $videoData){

        $datatoggle = "collapse";
        $areaexpanded = "false";
        $class = "collapse";
        if (1 == $count) {
        $datatoggle = "collapse";
        $areaexpanded = "true";
        $class = "collapse show";
        }

        @endphp

        <div class="videos">
            <div class="videosh4 addmoreh4">
                <h4 data-toggle="{{$datatoggle}}" data-target="#vcontainer{{$key}}" aria-expanded="{{$areaexpanded}}">Video {{$count}}</h4>
                <!-- <a href="{{route('admin.package.video.destroy', [$packageData->id, $videoData->id])}}" class="close remove-video removeitem" onclick="return ajaxDeleteItem(event, this);">
                <span aria-hidden="true">&times;</span>
            </a> -->
            </div>
            <div id="vcontainer{{$key}}" class="{{$class}}">
                <input type="hidden" name="video_id[]" value="{{$videoData->id}}">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Video Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="video_title[]" class="form-control" value="{{$videoData->title}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Video Description</label>
                    <div class="col-sm-10 ">
                        <textarea name="video_description[]" class="form-control texteditor" id="videotexteditor${{$key}}" rows="5">{{$videoData->description}}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Display Order</label>
                    <div class="col-sm-10">
                        <input type="number" name="video_position[]" class="form-control" value="{{$videoData->position}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Video Iframe Code</label>
                    <div class="col-sm-10 ">
                        <textarea name="video_iframe[]" class="form-control" rows="5">{{$videoData->iframe}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        @php
        $count = $count - 1;
        }
        }else{
        @endphp

        <div class="videos first-video">
            <div class="videosh4 addmoreh4">
                <h4 data-toggle="collapse" data-target="#vcontainer0" aria-expanded="true">Video 1</h4>
            </div>
            <div id="vcontainer0" class="collapse show">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Video Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="video_title[]" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Video Description</label>
                    <div class="col-sm-10 ">
                        <textarea name="video_description[]" class="form-control texteditor" id="videotexteditor0" rows="5"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Display Order</label>
                    <div class="col-sm-10">
                        <input type="number" name="video_position[]" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Video Iframe Code</label>
                    <div class="col-sm-10 ">
                        <textarea name="video_iframe[]" class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>

        @php
        }
        @endphp
        <!-- video section end -->

    </div>
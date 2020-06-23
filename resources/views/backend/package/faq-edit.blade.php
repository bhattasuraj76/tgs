<div class="float-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-faq-btn">
            Add More
        </button>
    </div>
</div>
<div class="clearfix"></div>
<div class="faqs__wrapper">

    @if(!$packageData->faqs->isEmpty())
    <?php $count = count($packageData->faqs); ?>
    @foreach($packageData->faqs as $faqData)
    <?php
    $datatoggle = "collapse";
    $areaexpanded = "false";
    $class = "collapse";
    if (1 == $count) {
        $datatoggle = "collapse";
        $areaexpanded = "true";
        $class = "collapse show";
    }
    ?>

    <div class="faqs">
        <div class="faqsh4 addmoreh4">
            <h4 data-toggle="{{$datatoggle}}" data-target="#fcontainer{{$faqData->id}}" aria-expanded="{{$areaexpanded}}">Faq {{$count}}</h4>
            <a href="{{route('admin.package.faq.destroy',[$packageData->id, $faqData->id])}}" class="close remove-faq removeitem" onclick="return ajaxDeleteItem(event, this);">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div id="fcontainer{{$faqData->id}}" class="{{$class}}">
            <input type="hidden" name="faq_id[]" value="{{$faqData->id}}">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Faq title</label>
                <div class="col-sm-10">
                    <input type="text" name="faq_title[]" class="form-control" value="{{$faqData->title}}">
                </div>
            </div>
            <hr>
            <div class=" form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="faq_description[]" class="form-control texteditor" id="faqckeditor{{$count}}" rows="10">{{$faqData->description}}</textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-10">
                    <input type="number" name="faq_position[]" class="form-control" value="{{$faqData->position}}">
                </div>
            </div>
        </div>
    </div>
    <?php $count = $count - 1; ?>

    @endforeach

    @else
    <div class="faqs first-faq">
        <div class="faqsh4 addmoreh4">
            <h4 data-toggle="collapse" data-target="#fcontainer0">Faq 1</h4>
        </div>
        <div id="fcontainer0">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Faq title</label>
                <div class="col-sm-10">
                    <input type="text" name="faq_title[]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="faq_description[]" class="form-control texteditor" id="faqckeditor0" rows="10"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-10">
                    <input type="number" name="faq_position[]" class="form-control">
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
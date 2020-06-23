<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Faq Title</label>
    <div class="col-sm-10">
        <input class="form-control" name="faq_megatitle" type="text">
    </div>
</div>
<hr>
<div class="float-right">
    <div class="btn-group">
        <button type="button" class="btn btn-primary add-more-faq-btn">
            Add More
        </button>
    </div>
</div>

<div class="clearfix"></div>
<div class="faqs__wrapper">

    <div class="faqs first-faq">
        <div class="faqsh4 addmoreh4">
            <h4 data-toggle="collapse" data-target="#fcontainer0">Faq 1</h4>
        </div>
        <div id="fcontainer0">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
                    <input type="text" name="faq_title[]" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                    <textarea name="faq_description[]" class="form-control texteditor" id="faqtexteditor0" rows="10"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Display Order</label>
                <div class="col-sm-10">
                    <input type="number" name="faq_position[]" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
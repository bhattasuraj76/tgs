//remove flash/error messages
setTimeout(function () {
    removeAlert();
}, 60000);

//convert title into slug
$("#slug").focus(function () {
    var title = $("#title").val();

    if (title && !this.value) {
        this.value = title
            .toLowerCase()
            .replace(/ /g, "-")
            .replace(/[^\w-]+/g, "");
    }
});

//--- global funcitons ---//

//confirming before deleting object
var isSure = false;
$(document).on("click", ".js-destroy", function (e) {
    e.preventDefault();
    if (isSure) return true;
    else {
        event.preventDefault();
        Swal.fire({
            title: "Are your sure to delete?",
            text: "You will not be able to recover it!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, keep it",
        }).then((result) => {
            if (result.value) {
                isSure = true;
                if (e.target instanceof HTMLFormElement) e.target.submit();
                e.target.click();
            }
        });
    }
});

//delete item using ajax
$(document).on('click', ".js-destroy-item", function (e) {
    e.preventDefault();
    let ele = $(this);
   
    Swal.fire({
        title: "Are your sure to delete?",
        text: "You will not be able to recover it!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, keep it",
    }).then((result) => {
        if (result.value) {
            showLoader();
            //perform ajax to delete item
            $.get(ele.attr('href'), function (data, status) {
                if (!data) return;
                if (data.resp == 1) {
                    ele.parent().parent().remove();
                    swal.fire({
                        title: "Item Deleted",
                        text: data.message,
                        type: "success",
                    });
                } else {
                    swal.fire({
                        title: "Error",
                        text: data.message,
                        type: "error",
                    });
                }
            }).always(function () {
                hideLoader();
            });
        }
    });
});

//delete picture using ajax
function ajaxDeletePicture(event, ele) {
    event.preventDefault();
    Swal.fire({
        title: "Are your sure to delete?",
        text: "You will not be able to recover it!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, keep it",
    }).then((result) => {
        if (result.value) {
            showLoader();

            //perform ajax to delete picture
            $.get(ele.href, function (data, status) {
                if (!data) return;
                if (data.resp == 1) {
                    $("#" + $(ele).data("image")).val(""); //change image input field value to null
                    $("#" + $(ele).data("holder")).attr("src", defaultImage); //change image src value to null
                    $(ele).remove(); //remove delete button
                    swal.fire({
                        title: "Item Deleted",
                        text: data.message,
                        type: "success",
                    });
                } else {
                    swal.fire({
                        title: "Error",
                        text: data.message,
                        type: "error",
                    });
                }
            }).always(function () {
                hideLoader();
            });
        }
    });
}

//remove dissmisable alerts
function removeAlert() {
    $(".alert.dismiss")
        .fadeTo(500, 0)
        .slideUp(500, function () {
            $(this).remove();
        });
}

//load filemanager
function loadFileManager() {
    $(".filemanager").filemanager("image", {
        prefix: route_prefix,
    });
}

//loader text editor
function loadTextEditor() {
    for (name in CKEDITOR.instances) {
        CKEDITOR.instances[name].destroy();
    }

    $(".texteditor").each(function () {
        // let id = this.getAttribute('id');
        CKEDITOR.replace(this.id, {
            filebrowserBrowseUrl: "{{url('/admin/media')}}",
            filebrowserUploadUrl: "{{url('/admin/media')}}",
        });
    });
}

//load datepicker
function loadDatepicker() {
    $(".calendar").datepicker({
        autoclose: true,
        todayHighlight: true,
        orientation: "bottom",
        format: "yyyy-mm-dd",
    });
}

//load select2
function loadSelect2() {
    $(".select2").select2({
        dropdownAutoWidth: true,
        selectOnClose: false,
    });
}

//load datatable
function loadDatatable() {
    $(".datatable").DataTable({
        paging: true,
        lengthChange: true,
        pageLength: 50,
        searching: true,
        ordering: false,
        info: true,
        autoWidth: false,
    });
}

//show loader
function showLoader() {
    $(".global-loader").addClass("loading");
}

//hide loader
function hideLoader() {
    $(".global-loader").removeClass("loading");
}

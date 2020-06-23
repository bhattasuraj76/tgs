//NOTE: this section has been modified to create and update packge form through ajax only
var url = baseUrl;

$("#departmentForm").on("submit", function (e) {
    e.preventDefault();
    emptyErrorMsg();
    $(".global-loader").addClass("loading");

    var url = baseUrl + "/department/validate";
    var formData = new FormData(this);

    if (timer) {
        clearTimeout(timer);
    }

    var timer = setTimeout(function () {
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                if (typeof data.resp == undefined) return;

                if (data.resp == 0) {
                    if ($.isEmptyObject(data.errors))
                        swal.fire({
                            type: "error",
                            title: "Error",
                            text: data.message,
                        });
                    else {
                        printErrorMsg(data.errors);
                        swal.fire({
                            type: "error",
                            title: "Validation Error",
                            confirmButtonText: "Ok",
                        }).then(() => {
                            $("#main-error-div").get(0).scrollIntoView({
                                block: "center",
                                behaviour: "smooth",
                            });
                        });
                    }
                } else {
                    swal.fire({
                        type: "success",
                        title: "Success",
                        text: data.message,
                    }).then(() => {
                        if (data.id)
                            location.href =
                                baseUrl + "/department/" + data.id + "/edit";
                    });
                }
            },
            error: function (data) {
                console.log(data.responseJSON);
            },
            complete: function () {
                $(".global-loader").removeClass("loading");
            },
        });
    }, 1000);
});

function printErrorMsg(msg) {
    $("#main-error-div").css("display", "block");
    $("#list-ajax-error").append(
        "<p class='mb-0'>Please correct these errors</p>"
    );

    $.each(msg, function (key, value) {
        var html = '<p class="help-block">' + value + "</p>";
        $("#list-ajax-error").append("<li>" + value + "</li>");
        var r = /\d+/; //digit regex
        var x = $.trim(key.match(r)); //trim and return digit
        var key = key.replace("." + x, ""); //remove `.digit` from key

        //check for simple name field e.g address
        $(html).insertAfter($('input[name="' + key + '"]'));
        $(html).insertAfter($('select[name="' + key + '"]'));
        $(html).insertAfter($('textarea[name="' + key + '"]'));
        $(html).insertAfter($('file[name="' + key + '"]'));

        //check for nested name field e.g address[]
        $("input[name='" + key + "[]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });
        $("select[name='" + key + "[]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });
        $("textarea[name='" + key + "[]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });

        $("file[name='" + key + "[]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });

        //check for sub-nested name field e.g address[city][]
        var [name1, name2] = key.split(".");
        if (!name2) return;
        $("input[name='" + name1 + "[" + name2 + "][]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });
        $("select[name='" + name1 + "[" + name2 + "][]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });
        $("textarea[name='" + name1 + "[" + name2 + "][]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });

        $("file[name='" + name1 + "[" + name2 + "][]']").each(function (i) {
            if (i == x) {
                $(html).insertAfter($(this));
            }
        });
    });
}

function emptyErrorMsg() {
    //empty error block and hide main error wrapper
    $("#list-ajax-error").empty();
    $("#main-error-div").css("display", "none");

    //remove error message under input fields
    $(".help-block").each(function () {
        $(this).remove();
    });
}

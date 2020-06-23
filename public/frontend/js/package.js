$(function () {
    const handleReviewClick = function () {
        $("#reviews-btn").trigger("click");
        $("#reviews")
            .get(0)
            .scrollIntoView({ behavior: "smooth", block: "center" });
        $("#reviews").addClass("test");
    };

    const handleDatespriceClick = function () {
        $("#datesprice-btn").trigger("click");
        $("#datesprice")
            .get(0)
            .scrollIntoView({ behavior: "smooth", block: "center" });
        $("#datesprice").addClass("test");
    };

    const remindChooseDatesprice = function () {
        swal({ icon: "warning", title: "Please select a trip " });
        $("#datesprice-btn").trigger("click");
        $("#datesprice")
            .get(0)
            .scrollIntoView({ behavior: "smooth", block: "center" });
    };
    //handle url hash
    !(function () {
        let hash = location.hash;
        if (hash == "#datesprice") handleDatespriceClick();
        if (hash == "#reviews") handleReviewClick();
        console.log("fads");
    })();

    //handle book now click
    $(".js-book-now-reminder").on("click", function () {
        remindChooseDatesprice();
    });

    //focus datesprice
    $(".js-fixed-departure-overview-btn").on("click", function () {
        handleDatespriceClick();
    });

    //focus reviews
    $(".js-reviews-overview-btn").on("click", function () {
        handleReviewClick();
    });

    //handle trip enquiry form
    const enquiryForm = $("#enquiryForm");

    // validate enquiry form when it is submitted
    $(enquiryForm).validate({
        rules: {
            full_name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                minlength: 6,
            },
            country: {
                required: '#enq_country option[value!=" "]:selected',
            },
            message: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            full_name: {
                required: "Please enter a your name",
                minlength: "Name must be minimum 3 characters",
            },
            phone: {
                required: "Please enter a your phone number",
                minlength: "Please enter valid phone number",
            },
            country: {
                required: "Please select your country",
            },
            message: {
                required: "Please describe your purpose of contact",
                minlength: "Message must be atleast 10 characters",
            },
        },
        submitHandler: function (form) {
            var formData = $("#enquiryForm").serialize();

            // $(".global-loader").addClass("loading");
            $("#enquirySubmitBtn").hide();
            $("#enquiryLoader").show();

            //form submitted successfully
            $.ajax({
                url: enquiryFormUrl,
                type: "POST",
                data: formData,
                success: function (data) {
                    if (data.resp == 1) {
                        //form submitted successfully
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: "Ok",
                        });

                        //reset form elements
                        $(enquiryForm).trigger("reset");
                    } else {
                        //error in form submission
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            button: "Ok",
                        });
                    }
                },
                error: function (data) {
                    console.log(data.responseText);
                },
                complete: function () {
                    // $(".global-loader").removeClass("loading");
                    $("#enquiryLoader").hide();
                    $("#enquirySubmitBtn").show();
                    UIkit.modal("#enquiryFormModel").hide();
                },
            });
        },
    });

    //handle trip customize form

    const customizeForm = $("#customizeForm");
    // validate customize trip form when it is submitted
    $(customizeForm).validate({
        rules: {
            full_name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                minlength: 6,
            },
            trip_start_date: {
                required: true,
            },
            trip_end_date: {
                required: true,
            },
            country: {
                required: '#country option[value!=" "]:selected',
            },
            message: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            full_name: {
                required: "Please enter a your name",
                minlength: "Name must be minimum 3 characters",
            },
            phone: {
                required: "Please enter a your phone number",
                minlength: "Please enter valid phone number",
            },
            trip_start_date: {
                required: "Please select trip start date",
            },
            trip_end_date: {
                required: "Please select trip end date",
            },
            country: {
                required: "Please select your country",
            },
            message: {
                required: "Please describe your purpose of contact",
                minlength: "Message must be atleast 10 characters",
            },
        },
        submitHandler: function (form) {
            var formData = $(customizeForm).serialize();

            //show loader
            $("#custTripBtn").hide();
            $("#custTripLoader").show();

            $.ajax({
                url: enquiryFormUrl,
                type: "POST",
                data: formData,
                success: function (data) {
                    if (data.resp == 1) {
                        //form submitted successfully
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: "Ok",
                        });

                        //reset form elements
                        $(customizeForm).trigger("reset");
                    } else {
                        //error in form submission
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            button: "Ok",
                        });
                    }
                },
                error: function (data) {
                    console.log(data.responseText);
                },
                complete: function () {
                    // remove loader
                    $("#custTripLoader").hide();
                    $("#custTripBtn").show();
                    UIkit.modal("#customizeFormModel").hide();
                },
            });
        },
    });

    //load datesprice via ajax
    $("#datesprice-year, #datesprice-month").on("change", function () {
        $("#divTableBody").hide();
        $(".dates-price-loader").removeAttr("hidden");

        let year = $("#datesprice-year").val();
        let month = $("#datesprice-month").val();

        if (timer) {
            clearTimeout(timer);
        }

        var timer = setTimeout(function () {
            $.ajax({
                url: datesPriceUrl,
                type: "POST",
                data: {
                    _token: csrfToken,
                    package_id: packageId,
                    year: year,
                    month: month,
                },
                success: function (data) {
                    $("#divTableBody").html(data.data);
                },
                error: function (data) {
                    console.log(data.responseText);
                },
                complete: function () {
                    $(".dates-price-loader").attr("hidden", "true");
                    $("#divTableBody").show();
                },
            });
        }, 1000);
    });
});

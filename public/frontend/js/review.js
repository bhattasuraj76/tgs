$(function () {
    var formElement = $("#reviewForm");
    // validate enquiry form when it is submitted
    $(formElement).validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            dp: {
                required: true,
            },
            address: {
                required: true,
            },
            title: {
                required: true,
            },
            description: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "The name field is required",
                minlength: "The name field must be minimum 3 characters",
            },
            dp: {
                required: "Please upload profile picture (jpg, png)",
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("reviewForm"));

            //collect ratings as object
            const ratings = {
                overall_rating: $(".overall-ratings input").val(),
                pretrip_rating: $(".pre-trip-ratings input").val(),
                itenary_rating: $(".itinerary-ratings input").val(),
                meals_rating: $(".meals-ratings input").val(),
                staffs_rating: $(".staffs-ratings input").val(),
                transportation_rating: $(".transportation-ratings input").val(),
                accomodation_rating: $(".accomodation-ratings  input").val(),
                value_for_money_rating: $(
                    ".value-for-money-ratings input"
                ).val(),
            };

            //append ratings to formData
            Object.entries(ratings).forEach((item, index) => {
                formData.append(item["0"], item["1"]);
            });

            //form submitted successfully
            $.ajax({
                url: reviewFormUrl,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function (data) {
                    $(".global-loader").addClass("loading");
                },
                success: function (data) {
                    //form submitted successfully
                    if (data.resp == 1) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: "Ok",
                        }).then(() => {
                            //reset form elements
                            $(formElement).trigger("reset");
                        });

                        return;
                    }

                    // otherwise error in form submission
                    handleErrors(data);
                },
                error: function (data) {
                    console.log(data.responseText);
                },
                complete: function () {
                    $(".global-loader").removeClass("loading");
                },
            });
        },
    });

    function handleErrors(data) {
        swal({
            title: "Error",
            text: data.message,
            icon: "error",
            button: "Ok",
        }).then(() => {
            $("html, body").animate(
                {
                    scrollTop: "0px",
                },
                800
            );
        });

        if (data.errors) printErrors(data.errors);
    }

    function printErrors(errors = {}) {
        let errorDiv = $("<div class='error-list'></div>");

        Object.entries(errors).forEach((item, index) => {
            errorDiv.append(`<p class="is-invalid">${item[1]}</p>`);
        });

        $(".review-internal").before(errorDiv[0]);

        setTimeout(function () {
            $(".error-list").hide();
        }, 6000);
    }
});

$(function () {
    const bookingForm = $("#bookingForm2");
    // validate enquiry form when it is submitted
    $(bookingForm).validate({
        rules: {
            "full_name[]": {
                required: true,
                minlength: 3,
            },
            "email[]": {
                required: true,
                email: true,
            },
            "phone[]": {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            "full_name[]": {
                required: "The name field is required",
                minlength: "The name field must be minimum of 3 characters",
            },
            "phone[]": {
                required: "The phone number field is required",
                minlength: "Please enter valid phone number",
            },
        },
        submitHandler: function (form) {
            var formData = $(bookingForm).serialize();

            //form submitted successfully
            $.ajax({
                url: bookingFormUrl,
                type: "POST",
                data: formData,
                beforeSend: function () {
                    $(".global-loader").addClass("loading");
                },
                success: function (data) {
                    if (data.resp == 1) {
                        //form submitted successfully
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: "Ok",
                        }).then((ok) => {
                            //reset form elements
                            $(bookingForm).trigger("reset");

                            setTimeout(function () {
                                location.href = "/";
                            }, 2000);
                        });
                        return;
                    }

                    //error in form submission
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

            $("#bookingForm2").before(errorDiv[0]);

            setTimeout(function () {
                $(".error-list").hide();
            }, 10000);
        }

        $(document).on('click', '#addNewTravellerFormBtn', function(e){
            e.preventDefault();
            let count = $('.each-traveller').length;
            $(".submit-btn").hide();

            let html = `
                        <div class="each-traveller">
                            <h2>
                                Traveller ${count+1}
                            </h2>
                            <ul class="uk-light" uk-accordion="multiple: true">
                                <li class="">
                                    <a class="uk-accordion-title" href="#">Input Personal Details</a>
                                    <div class="uk-accordion-content">
                                        <div class="uk-grid uk-grid-medium" uk-grid>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Full Name</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="full_name[]" required>
                                            </div>
                                            <div class="form-group uk-width-1-3">
                                                <label>Gender</label>
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                    <select class="uk-select uk-box-shadow-small" name="gender[${count}]" required>
                                                        <option value="">Please Select</option>
                                                        <option selected>Male </option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group uk-width-2-3 ">
                                                <label>Date of Birth</label>
                                                <div class="uk-grid uk-grid-medium" uk-grid>
                                                    <div class="uk-position-relative uk-width-1-3@m">
                                                        <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                        <select class="uk-select uk-box-shadow-small" name="dob_day[${count}]" id="days${count}">
                                                         ${daysHtml}
                                                        </select>
                                                    </div>
                                                    <div class="uk-position-relative uk-width-1-3@m">
                                                        <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                        <select class="uk-select uk-box-shadow-small" name="dob_month[${count}]">
                                                            ${monthsHtml}
                                                        </select>
                                                    </div>
                                                    <div class="uk-position-relative uk-width-1-3@m">
                                                        <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                        <select class="uk-select uk-box-shadow-small" name="dob_year[${count}]">
                                                          ${yearsHtml}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Email Address</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="email[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Reconfirm Email Address</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="confirm_email[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Contact number</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="phone[${count}]" required>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <a class="uk-accordion-title" href="#">Input Contact Address</a>
                                    <div class="uk-accordion-content">
                                        <div class="uk-grid uk-grid-medium" uk-grid>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Street </label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="street[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Town / City </label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="city[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>State / Province</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="state[${count}]" required>
                                            </div>
                                            <div class="form-group uk-width-1-10 ">
                                                <label>Country</label>
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                    <select class="uk-select uk-box-shadow-small" name="country[${count}]" required>
                                                        <option value="">Please Select</option>
                                                        ${countriesHtml}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group uk-width-1-10 ">
                                                <label>Emergency contact ( Name/Phone no.)</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="emergency_phone[${count}]" required>
                                            </div>
                                            <div class="form-group uk-width-1-10 ">
                                                <label>How did you hear about us</label>
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: chevron-down"></span>
                                                    <select class="uk-select uk-box-shadow-small" name="how_you_hear_about_us[${count}]" required>
                                                        <option value="">Please Select</option>
                                                        <option value="frineds">Freinds</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <a class="uk-accordion-title" href="#">Input Passport Details</a>
                                    <div class="uk-accordion-content">
                                        <div class="uk-grid uk-grid-medium" uk-grid>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Name on Passport (leave as it is if same as name provided)
                                                </label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="passport_name[${count}]">
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Passport Number </label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="passport_no[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Place of Issue</label>
                                                <input class="uk-input uk-box-shadow-small" type="text" placeholder="Some text..." name="passport_place_of_issue[${count}]" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label>Issue Date</label>
                                                <input class="uk-input uk-box-shadow-small date_picker" placeholder="Some text..." name="passport_date_of_issue[${count}]" autocomplete="off" required>
                                            </div>
                                            <div class="uk-form-controls uk-width-1-10">
                                                <label> Expiration Date</label>
                                                <input class="uk-input uk-box-shadow-small date_picker"  placeholder="Some text..." name="passport_expiry_date[${count}]" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        
                            <div class="submit-btn">
                                <button id="addNewTravellerFormBtn">
                                    Add another participant
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                        </div>
            `;

            

            $(".each-traveller:last").after(html);
            // $(`#days${count}`).html(days);

            loadDatepicker();
        });
});

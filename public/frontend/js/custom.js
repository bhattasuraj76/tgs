!(function loadDatepicker() {
    $(".calendar").datepicker({
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true,
        minDate: 0,
    });

    $.datepicker.setDefaults({
        dateFormat: "yy-mm-dd",
    });

    // let startDate = formatDate(new Date());
    // let startDateNepali = AD2BS(startDate);
    // console.log(startDateNepali);

    $(".nepali-calendar").nepaliDatePicker({
        npdMonth: true,
        npdYear: true,
        npdYearCount: 1,
        disableDaysBefore: '1',
		disableDaysAfter: '10',
        autoclose: true,
    });
})();

!(function loadTimepicker() {
$(".timepicker").timepicker({
    timeFormat: "h:mm p",
    interval: 30,
    minTime: "10",
    maxTime: "6:00pm",
    defaultTime: "11",
    startTime: "10:00",
    dynamic: false,
    dropdown: true,
    scrollbar: true,
});
})();

//print error messages under form fields
function printErrorMsg(msg) {
    $.each(msg, function (key, value) {
        var html = '<p class="error-text">' + value + "</p>";

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

//remove error message under form fields
function emptyErrorMsg() {
    $(".error-text").each(function () {
        $(this).remove();
    });
}

//foramt date
function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}
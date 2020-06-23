$(function () {
    var requiredCheckboxes = $("[type=checkbox]");
    requiredCheckboxes.change(function () {
        if (requiredCheckboxes.is(":checked")) {
            requiredCheckboxes.removeAttr("required");
        } else {
            requiredCheckboxes.attr("required", "required");
        }
    });

    //if some of the permisssions are checked initially then remove required attr(case of server side validation error)
    !(function () {
        var requiredCheckboxes = $("[type=checkbox]").filter(":checked");
        if (requiredCheckboxes.length > 0)
            $("[type=checkbox]").removeAttr("required");
    })();
});

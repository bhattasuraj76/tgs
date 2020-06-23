$("input, select, textarea").on("focus", function (e) {
    $(this).blur();
});

$('button[type="submit"], input[type="submit"').on("click", function (e) {
    e.preventDefault();
});

$("form").on("submit", function (e) {
    e.preventDefault();
});

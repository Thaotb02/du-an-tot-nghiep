$('.User-avtar').click(function () {
    if ($(".User-Dropdown").hasClass("U-open")) {
        $('.User-Dropdown').removeClass("U-open");
    }
    else {
        $('.User-Dropdown').addClass("U-open");
    }
});
$('#check').click(function () {
    if ($(this).is(':checked')) {
        $('.submit').removeAttr('disabled');
    } else {
        $('.submit').attr('disabled', 'disabled');
    }
});

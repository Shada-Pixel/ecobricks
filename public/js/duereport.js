$(document).ready(function () {
    $('#printbtn').click(function (e) {
        $('#datereport').html($('.today').val());
        printNow();
    });
});


function getToday() {
    const local = new Date();
    local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
}


function printNow() {
    var printContent = $('.printable').html();
    var originalContent = $('body').html();
    $('body').html(printContent);
    window.print();
    $('body').html(originalContent);
}

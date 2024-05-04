$(document).ready(function () {
    $('#printbtn').click(function (e) {
        $('#dateform').html($('.weekago').val());
        $('#dateto').html($('.today').val());
        printNow();
    });
});


function printNow() {
    var printContent = $('.printable').html();
    var originalContent = $('body').html();
    $('body').html(printContent);
    window.print();
    $('body').html(originalContent);
}

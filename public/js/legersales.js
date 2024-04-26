$(document).ready(function () {
    $('#printbtn').click(function (e) {
        printNow();
    });

});


function printNow() {
    // window.print();
    var printContent = $('.printable').html();
    var originalContent = $('body').html();
    $('body').html(printContent);
    window.print();
    $('body').html(originalContent);
}





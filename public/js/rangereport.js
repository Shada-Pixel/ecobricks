

$(document).ready(function () {
    // On filter button click
    // $('#dailyFilterBtn').click(function (e) {
    //     e.preventDefault();
    //     orderlist.draw();
    // });




    $('#printbtn').click(function (e) {
        $('#dateform').html($('.weekago').val());
        $('#dateto').html($('.today').val());
        printNow();
    });



});


// function getToday() {
//     const local = new Date();
//     local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
//     return local.toJSON().slice(0, 10);
// }

// function weekago() {
//     var currentDate = new Date();
//     var sevenDaysEarlier = new Date(currentDate.getTime() - (7 * 24 * 60 * 60 * 1000));
//     var formattedDate = sevenDaysEarlier.toISOString().split('T')[0];
//     return formattedDate;
// }



function printNow() {
    // window.print();
    var printContent = $('.printable').html();
    var originalContent = $('body').html();
    $('body').html(printContent);
    window.print();
    $('body').html(originalContent);
}

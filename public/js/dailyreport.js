
var orderlist = null;

$(document).ready(function () {

    $('.today').val(getToday());
    $('#datereport').html(getToday());


    // On filter button click
    $('#dailyFilterBtn').click(function (e) {
        e.preventDefault();
        orderlist.draw();
    });


    $('#printbtn').click(function (e) {
        $('#datereport').html($('.today').val());
        printNow();
    });




    let urlPath = 'dailyreport';
    orderlist =  $('#orderTable').DataTable({
        "processing": true,
        "serverSide": true,
        searching: false,
        paging: false,
        ordering:  false,
        info: false,
        // navigation: false,
        ajax: {
            url: BASE_URL+urlPath,
            BeforeSend: function(){
                $('#datereport').text($('.today').val);
              },
            data: function (d) {
                d.today = $('.today').val();
            },

        },
        "columns": [
            { "data": "order_date" },
            {
                data: null,
                render: function (data) {

                    let customer = 'Cash sell';

                    if (data.customer) {
                        customer = `<a href="${BASE_URL+'customers/'+data.customer_id}">${data.customer.name}</>`;
                    }

                    return customer;
                }
            },
            { "data": "note" },
            { "data": "chalan_number" },
            { "data": "type" },
            { "data": "brick_grade" },


            { "data": "brick_qty" },
            { "data": "chips_qty" },
            { "data": "brick_up" },
            { "data": "total_bill" },
            { "data": "paid_bill" },
            { "data": "due_bill" }
        ],
        'columnDefs': [ {
            'targets': [6,9],
            'orderable': false
        }],

    });
});


function getToday() {
    const local = new Date();
    local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
}


function printNow() {
    // window.print();
    var printContent = $('.printable').html();
    var originalContent = $('body').html();
    $('body').html(printContent);
    window.print();
    $('body').html(originalContent);
}

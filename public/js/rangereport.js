
var orderlist = null;

$(document).ready(function () {

    $('.today').val(getToday());
    $('.weekago').val(weekago());


    // On filter button click
    $('#dailyFilterBtn').click(function (e) {
        e.preventDefault();
        orderlist.draw();
    });


    let urlPath = 'priodreport';
    orderlist =  $('#orderTable').DataTable({
        "processing": true,
        "serverSide": true,
        "searching":false,
        paging:false,
        ajax: {
            url: BASE_URL+urlPath,
            data: function (d) {
                d.today = $('.today').val();
                d.weekago = $('.weekago').val();
            }
        },
        "columns": [
            // {  data : 'DT_RowIndex', name: 'DT_RowIndex'},
            { "data": "order_date" },
            {
                data: null,
                render: function (data) {
                    let bookInfoUrl = ''

                    if (data.transport == 1) {
                        bookInfoUrl = `<span >Trolly</span>`;
                    } else if (data.transport == 2) {
                        bookInfoUrl = `<span >Track</span>`;
                    }else if (data.transport == 3) {
                        bookInfoUrl = `<span >Alom Shadhu</span>`;
                    }else {
                        bookInfoUrl = `<span >Self</span>`;
                    }
                    return bookInfoUrl;
                }
            },
            { "data": "type" },
            { "data": "brick_grade" },
            { "data": "order_number" },
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

function weekago() {
    var currentDate = new Date();
    var sevenDaysEarlier = new Date(currentDate.getTime() - (7 * 24 * 60 * 60 * 1000));
    var formattedDate = sevenDaysEarlier.toISOString().split('T')[0];
    return formattedDate;
}





var orderlist = null;

$('#bookSearch').on('keyup', function () {
    orderlist.draw();
});

$(document).ready(function () {

    $('.today').val(getToday());


    // On filter button click
    $('#dailyFilterBtn').click(function (e) {
        e.preventDefault();

    });


    let urlPath = 'dailyreport';
    orderlist =  $('#orderTable').DataTable({
        "processing": true,
        "serverSide": true,
        "searching":false,
        paging:false,
        ajax: {
            url: BASE_URL+urlPath,
            data: function (d) {
                d.bookSearch = $('.today').val();
            }
        },
        "columns": [
            // {  data : 'DT_RowIndex', name: 'DT_RowIndex'},
            { "data": "order_date" },
            { "data": "transport" },
            { "data": "type" },
            { "data": "brick_grade" },
            { "data": "transport" },
            { "data": "transport" },
            { "data": "transport" },
            { "data": "transport" },
            { "data": "transport" },
            { "data": "transport" },

            {
                data: null,
                render: function (data) {
                    let bookInfoUrl = BASE_URL+'books/info/'+data.id
                    return `<a href="${BASE_URL}books/edit/${data.id}" class="btn btn-success btn-sm"  aria-pressed="true"><i class="fa fa-pencil"></i></a>
                        <button type="button"  class="btn btn-danger btn-sm" onclick="deletebook(${data.id});" aria-pressed="true"><i class="fa fa-trash"></i></button>
                        <a href="${bookInfoUrl}" target="_blank" class="btn btn-warning btn-sm"  ><i class="fa fa-eye"></i></a>
                        <a href="${BASE_URL}books/${data.id}/reviews" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-star"></i></a>`;
                }
            }
        ],
        'columnDefs': [ {
            'targets': [6,9],
            'orderable': false
        }],

    });
});



function deletebook(bookId) {
    Swal.fire({
        title: "Delete ?",
        text: "Are you sure to delete this book ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'DELETE',
                url: BASE_URL +'books/delete',
                data: {
                    bookId: bookId,
                },
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire('Success!', response.message, 'success');
                        orderlist.draw();
                    }else if(response.status == "error"){
                        Swal.fire('This item is not deletable!', response.message, 'error');
                        orderlist.draw();
                    }
                }
            });
        }
    });
}





function getToday() {
    const local = new Date();
    local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
}

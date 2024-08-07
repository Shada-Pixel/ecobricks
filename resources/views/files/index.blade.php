<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dblue leading-tight">
            {{ __('Files') }}
        </h2>
    </x-slot>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" /> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-4 hidden sm:block">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-dblue leading-tight">Upload New file</h2>
                    <form method="POST" action="{{ route('files.store') }}" id="orderForm" enctype="multipart/form-data">
                        @csrf


                        <!-- Chalan number -->
                        <div>
                            <x-file-input type="file" id="file" class="block mt-1 w-full onlynumber" name="file" value=""/>
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4 ">
                            <x-primary-button class="ms-4" id="submitButton">
                                {{ __('Upload') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-12 sm:col-span-8">

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-dblue leading-tight">All Files</h2>
                    <table class="sp-table">
                        <thead>
                        <tr>
                            <th>File Name</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->name }}</td>
                                <td class="print:hidden flex justify-end gap-4">
                                    <div class="flex gap-2 text-xl">
                                        @if (in_array(pathinfo($file->name, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png','pdf']))
                                        <a class="bg-green-400 p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="{{ route('files.show', $file->id) }}"><i class="ri-eye-line mr-0"></i><span class="icon-[solar--eye-outline]"></span></a>
                                        @endif

                                        <a class="bg-brick p-2 rounded-sm flex justify-center items-center text-white text-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('files.download', $file->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 19h18v2H3zM13 9h7l-8 8l-8-8h7V1h2z"/></svg>
                                        </a>
                                        <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="margin-bottom: 5px">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-500 p-2 rounded-sm text-sm flex justify-center items-center text-white deleteBtn"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script>


            $(document).ready(function() {
                // This is the table of all customers
                $('#customerTable').dataTable({
                    paging: true,
                });


                 // JQuery
                $(document).ready( function() {
                    $('#orderdate').val(getToday());
                });



                // Bricks total calculation
                $('#brick_qty, #brick_up').change(function() {
                    // Get values from input fields
                    var bricksqty = parseFloat($('#brick_qty').val()) || 0;
                    var bricksup = parseFloat($('#brick_up').val()) || 0;
                    // Calculate result
                    var brickstotal = bricksqty * bricksup;
                    // Update result field
                    $('#bricks_total').val(brickstotal);
                    calsubtotal ();
                    caltotal ();
                    calculatedue();
                });


                // chips total calculation
                $('#chip_qty, #chip_up').change(function() {
                    // Get values from input fields
                    var chipsqty = parseFloat($('#chip_qty').val()) || 0;
                    var chipsup = parseFloat($('#chip_up').val()) || 0;
                    // Calculate result
                    var chipstotal = chipsqty * chipsup;
                    // Update result field
                    $('#chips_total').val(chipstotal);
                    calsubtotal ();
                    caltotal ();
                    calculatedue();
                });

                $('#chips_total, #bricks_total').change(function() {

                    calsubtotal ();
                    caltotal ();
                    calculatedue();
                });


                // Order discount
                $('#order_discount').change(function() {
                    calculatedue();
                    caltotal ();
                });
                $('#subtotal, #order_paid').change(function() {calculatedue();});



                $('#submitButton').click(function (e) {
                    e.preventDefault();
                    var orderDue = $('#order_due').val();
                    var selectedValue = $('#customer_id').val();

                    if (orderDue == 0) {
                        $('#orderForm').submit();
                    }else{
                        if(selectedValue === ""){
                            alert(`Order due is: ${orderDue}. Please check Customer field and select/create one.`);
                        } else {
                            $('#orderForm').submit();
                        }
                    }
                });
            });

            function calsubtotal (){
                var ct = parseFloat($('#chips_total').val()) || 0;
                var bt = parseFloat($('#bricks_total').val()) || 0;
                var subtotal = ct + bt;
                $('#subtotal').val(subtotal);
                // console.log(subtotal);
            }


            // calculate total
            function caltotal (){
                var st = $('#subtotal').val();
                var od = $('#order_discount').val();
                var pfst = parseFloat(st) || 0;
                var pfod = parseFloat(od) || 0;

                var total = pfst - od;
                $('#total').val(total);
            }

            function getToday(){
                const local = new Date();
                local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
                return local.toJSON().slice(0,10);
            }

            function calculatedue() {
                var st = $('#total').val();
                var op = parseFloat($('#order_paid').val()) || 0;
                var due = st - op;
                $('#order_due').val(due);
            }


        </script>

    </x-slot>
</x-app-layout>

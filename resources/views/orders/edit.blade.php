<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dblue leading-tight">
            {{ __('Edit this order') }}
        </h2>
    </x-slot>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" /> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-8">

                <div class="p-6 text-gray-900">
                    <div class="">
                        <form method="POST" action="{{ route('orders.update',$order->id) }}" id="orderForm">
                            @csrf
                            @method('PATCH')
                            <div class="flex justify-between gap-6 items-center">
                                <!-- Date -->
                                <div class="mt-4">
                                    <x-input-label for="orderdate" :value="__('Date')" />
                                    <x-text-input id="orderdate" class="block mt-1 w-full" type="date" name="orderdate" />
                                </div>
                                <!-- Transport -->
                                <div class="mt-4">
                                    <x-input-label for="transport" :value="__('Transport')" />
                                    <x-select-input id="transport" name="transport" required>
                                        <option value="2" @if ($order->transport == 2) selected @endif>Truck</option>
                                        <option value="1" @if ($order->transport == 1) selected @endif>Trolly</option>
                                        <option value="3" @if ($order->transport == 3) selected @endif>Alom Shadhu</option>
                                        <option value="4" @if ($order->transport == 4) selected @endif>Self</option>
                                    </x-select-input>
                                </div>
                                <!-- Type -->
                                <div class="mt-4">
                                    <x-input-label for="order_type" :value="__('Type')" />
                                    <x-select-input id="order_type" name="order_type" required>
                                        <option value="1" @if ($order->type == 1) selected @endif>F</option>
                                        <option value="2" @if ($order->type == 2) selected @endif>M</option>
                                    </x-select-input>
                                </div>
                                <!-- Customer -->
                                <div class="mt-4">
                                    <x-input-label for="customer_id" :value="__('Customer')" />
                                    <x-select-input id="customer_id" name="customer_id">
                                        <option value="">Unknown</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}"  @if ($order->customer_id == $customer->id) selected @endif>{{$customer->name}}</option>
                                        @endforeach
                                    </x-select-input>
                                </div>
                            </div>
                            <div class="flex justify-between gap-6 items-center mt-4">
                                <!-- Chalan number -->
                                <div>
                                    <x-input-label for="chalan_number" :value="__('Chalan Number')" />
                                    <x-text-input id="chalan_number" class="block mt-1 w-full onlynumber" name="chalan_number" value="{{ $order->chalan_number ? $order->chalan_number  : ''}}"/>
                                    <x-input-error :messages="$errors->get('chalan_number')" class="mt-2" />
                                </div>
                                <!-- Note -->
                                <div class="flex-grow">
                                    <x-input-label for="note" :value="__('Order note')" />
                                    <x-text-input id="note" class="block mt-1 w-full" name="note" value="{{$order->note ? $order->note : ''}}"/>
                                    <x-input-error :messages="$errors->get('note')" class="mt-2" />
                                </div>

                            </div>

                            {{-- Bricks --}}
                            <div class="flex justify-between items-center gap-6 mt-4">
                                <!-- Bricks qty -->
                                <div>
                                    <x-input-label for="brick_qty" :value="__('Bricks QTY')" />
                                    <x-text-input id="brick_qty" class="block mt-1 w-full" name="brick_qty" type="number" required autofocus value='{{$order->brick_qty ? $order->brick_qty : 0}}'/>
                                    <x-input-error :messages="$errors->get('brick_qty')" class="mt-2" />
                                </div>
                                <!-- Grade -->
                                <div>
                                    <x-input-label for="name" :value="__('Bricks Grade')" />
                                    <x-select-input id="grade" name="grade" required>
                                        <option value="1">1</option>
                                        <option value="2">1.5</option>
                                        <option value="3">Others</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <!-- Unit Price -->
                                <div>
                                    <x-input-label for="brick_up" :value="__('Unit Price')" />
                                    <x-text-input id="brick_up" class="block mt-1 w-full" type="number" name="brick_up" :value="old('brick_up')" required value="{{$order->brick_price ? $order->brick_price : 9.5}}"/>
                                    <x-input-error :messages="$errors->get('brick_up')" class="mt-2" />
                                </div>
                                <!-- Bricks Total -->
                                <div>
                                    <x-input-label for="bricks_total" :value="__('Bricks Total')" />
                                    <x-text-input id="bricks_total" class="block mt-1 w-full" type="number" name="bricks_total" required value="{{$order->brick_total ? $order->brick_total : 0}}" readonly/>
                                </div>
                            </div>


                            {{-- Chips --}}
                            <div class="flex justify-between items-center gap-6 mt-4">
                                <!-- Chips qty -->
                                <div>
                                    <x-input-label for="chip_qty" :value="__('Chips QTY')" />
                                    <x-number-input id="chip_qty" class="block mt-1 w-full" name="chip_qty" :value="old('chip_qty')" required value="{{$order->chips_qty ? $order->chips_qty : 0}}"/>
                                </div>
                                <!-- Grade -->
                                <div>
                                    <x-input-label for="chips_grade" :value="__('Chips Grade')" />
                                    <x-select-input id="chips_grade" name="chips_grade" required>
                                        <option value="1">3/4</option>
                                        <option value="2">Macadam</option>
                                        <option value="3">Bats</option>
                                        <option value="4">Chips</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('chips_grade')" class="mt-2" />
                                </div>
                                <!-- Unit Price -->
                                <div>
                                    <x-input-label for="chip_up" :value="__('Unit Price')" />
                                    <x-text-input id="chip_up" class="block mt-1 w-full" type="number" name="chip_up" :value="old('chip_up')" required value="{{$order->chips_price ? $order->chips_price : 100}}"/>
                                </div>
                                <!-- Total chips price -->
                                <div>
                                    <x-input-label for="chips_total" :value="__('Chips Total')" />
                                    <x-text-input id="chips_total" class="block mt-1 w-full" type="number" name="chips_total" :value="old('chips_total')" required value="{{$order->chips_total ? $order->chips_total : 0 }}" readonly/>
                                </div>
                            </div>

                            <hr class="mt-4">
                            <div class="">
                                <div class="mt-4 flex justify-end items-center">
                                    <p>Subtotal:  </p><x-text-input id="subtotal" class="block ml-4" type="number" name="subtotal" value='{{$order->total_bill ? $order->total_bill : 0 }}'/>
                                </div>
                                <div class="mt-2 flex justify-end items-center">
                                    <p>Paid:  </p><x-text-input id="order_paid" class="block ml-4" type="number" name="paid" value='{{$order->paid_bill ? $order->paid_bill : 0 }}'/>
                                </div>
                                <div class="mt-2 flex justify-end items-center">
                                    <p>Due:  </p><x-text-input id="order_due" class="block ml-4" type="number" name="due" value='{{$order->due_bill ? $order->due_bill : 0 }}'/>
                                </div>
                            </div>



                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4" id="submitButton">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

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
                    paging: false
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
                    calculatedue();
                });

                $('#chips_total, #bricks_total').change(function() {

                    calsubtotal ();
                    calculatedue();
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

            function getToday(){
                const local = new Date();
                local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
                return local.toJSON().slice(0,10);
            }

            function calculatedue() {
                var st = $('#subtotal').val();
                var op = parseFloat($('#order_paid').val()) || 0;
                var due = st - op;
                $('#order_due').val(due);
            }


        </script>

    </x-slot>
</x-app-layout>

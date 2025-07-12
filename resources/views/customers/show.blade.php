<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
        <style>
            /* @media print {
            tfoot{
                position: fixed;
                bottom: 20px;
                left:0px;
                width:100% !important;
            }
            } */
        </style>
    </x-slot>
    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $customer->name }}
            </h2>
            <div class="flex gap-4 mt-2">
                <a href="{{route('customers.edit',$customer->id)}}" class=""><x-primary-button>Edit</x-primary-button></a>
                <a href="{{route('customers.index')}}" class=""><x-secondary-button>Back</x-secondary-button></a>
            </div>
        </div>
    </x-slot>

    {{-- Customers orders --}}
    <div class="py-12">
        <div class="max-w-7xl print:max-w-full mx-auto print:mx-0 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg print:shadow-none">
                <div class="px-6 pt-6 print:hidden flex justify-between items-center">
                    <ul class="list-inline p-0 m-0">
                        <li class="mb-2">
                            <div class="d-flex align-items-center">
                                <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="mb-0">{{ $customer->email }}</p>

                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex align-items-center">
                                <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <p class="mb-0">{{ $customer->phone }}</p>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex align-items-center">
                                <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mb-0">{{ $customer->address ? $customer->address : 'Unknown' }}</p>
                            </div>
                        </li>
                    </ul>
                    <div class="">
                        <x-primary-button id="printbtn">Print</x-primary-button>
                    </div>
                </div>

                <div class="p-6 print:p-0 text-gray-900 printable print:min-w-full">
                    {{-- printable head --}}
                    <div class="p-6 print:p-0 print:flex justify-between items-center flex">
                        <x-plogo></x-plogo>
                        <div class="text-right">

                            <h2 class="text-3xl font-bold">{{ $customer->name }}</h2>
                            <p>Date:
                                @if ($from_date && $to_date)
                                <span id="">{{$from_date." To ".$to_date}}</span>
                                @else
                                <span id="dateto"></span>
                                @endif
                            </p>
                            <ul class=" p-0 m-0">
                                <li class="mb-2">
                                    <div class="flex justify-end items-center">
                                        <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <p class="mb-0">{{ $customer->email }}</p>

                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="flex justify-end items-center">
                                        <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <p class="mb-0">{{ $customer->phone }}</p>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="flex justify-end items-center">
                                        <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p class="mb-0">{{ $customer->address ? $customer->address : 'Unknown' }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    {{-- Filter div --}}
                    <div class="flex justify-center items-center print:hidden">
                        <div class="bg-gray-300 p-2 mb-4 rounded-md inline-block max-w-lg mx-auto">
                            <form action="{{route('customers.show', $customer->id)}}" method="get" class="inline-block">
                                @csrf
                                <!-- Order date -->
                                <div class="">
                                    <x-text-input id="from_date" class="flex-grow" name="from_date" required type="date"/>
                                    <span>To</span>
                                    <x-text-input id="to_date" class="flex-grow" name="to_date" required type="date"/>
                                    <x-primary-button class="" id="">
                                        {{ __('Filter') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            <a href="{{route('customers.show', $customer->id)}}">
                                <button class="inline-flex items-center px-2 sm:px-6 py-2 sm:py-4 bg-blue-800 border-none rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lgreen focus:bg-lgreen active:bg-lgreen focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Reset') }}
                                </button>
                            </a>
                        </div>
                    </div>
                    <table class="sp-table mb-0" id="oorderTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Order Date</th>
                                <th>Challan</th>
                                <th>Order Note</th>
                                <th class="print:hidden">Order Number</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Bricks</th>
                                <th class="text-center">B.Rate</th>
                                <th class="text-center">Chips</th>
                                <th class="text-center">C.Rate</th>
                                <th class="text-center">Bill</th>
                                <th class="text-center">Paid</th>
                                {{-- <th class="text-center">Due</th> --}}
                                <th class="text-center">Balance</th>
                                <th class="print:hidden">Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ date('d-M-y', strtotime($order->order_date)) }}</td>
                                <td>{{ $order->chalan_number }}</td>
                                <td>{{ $order->note? $order->note : '' }}</td>
                                <td class="print:hidden">{{ $order->order_number}}</td>
                                <td class="text-center">@if ($order->type == 1) F @else M @endif </td>
                                <td class="text-center">@if ($order->brick_grade == 1) 1 @else 1.5 @endif </td>
                                <td class="text-center">{{ $order->brick_qty }}</td>
                                <td class="text-center">{{ $order->brick_up }}</td>
                                <td class="text-center">{{ $order->chips_qty }}</td>
                                <td class="text-center">{{ $order->chips_up }}</td>
                                <td class="text-right">{{ $order->total_bill }}</td>
                                <td class="text-right">{{ $order->paid_bill }}</td>
                                {{-- <td class="text-right">{{ $order->due_bill }}</td> --}}
                                <td class="text-right">{{ $order->balance }}</td>
                                <td class="print:hidden">
                                    <a href="{{route('orders.edit', $order->id)}}">Edit</a>
                                    {{-- <button type="submit" class="text-red-500 p-2 h-10 rounded-sm flex justify-center items-center " onclick="editform()" data-placement="top" title="" data-original-title="Delete">Edit</button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="print:hidden"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Bricks: {{ $footer_brick_qty}}</p></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Chips: {{ $footer_chip_qty}}</p></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Bill: {{ $footer_total_bill }}</p></td>
                                <td><p class="mb-0 text-right">Paid: {{ $footer_paid_bill }}</p></td>
                                {{-- <td>
                                    <p class="mb-0 text-right">Due: {{ $customer->duebill() }}</p>
                                </td> --}}
                                <td><p class="mb-0 text-right">Due: {{ $footer_due_bill }}</p></td>
                                <td class="print:hidden"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script>

            $(document).ready(function () {
                $('#dateto').html(getToday());
                new DataTable('#orderTable', {
                    layout: {
                        topStart: {
                            buttons: [ 'pdfHtml5']
                        }
                    }
                });



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


            function getToday() {
                const local = new Date();
                local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
                return local.toJSON().slice(0, 10);
            }


        </script>

    </x-slot>
</x-app-layout>

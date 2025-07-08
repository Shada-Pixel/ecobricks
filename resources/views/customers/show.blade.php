<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
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
                            <p>Date: <span id="dateto"></span></p>
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
                    <table class="sp-table mb-0" id="oorderTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Order Date</th>
                                <th>Challan</th>
                                <th>Order Note</th>
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
                                {{-- <th class="print:hidden">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($customer->orders as $order)
                            <tr>
                                <td>{{ date('d-M-y', strtotime($order->order_date)) }}</td>
                                <td>{{ $order->chalan_number }}</td>
                                <td>{{ $order->note? $order->note : '' }}</td>
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
                                {{-- <td class="print:hidden">
                                    <div class="flex gap-2 text-xl">
                                        <a class="bg-green-400 p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="{{ route('orders.show', $order->id) }}"><i class="ri-eye-line mr-0"></i><span class="icon-[solar--eye-outline]"></span>
                                        <a class="bg-brick p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('orders.edit', $order->id) }}"><i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="margin-bottom: 5px">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-500 p-2 h-10 rounded-sm flex justify-center items-center text-white" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                {{-- <td></td> --}}
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Bricks: {{ $customer->bricks() }}</p></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Chips: {{ $customer->chips() }}</p></td>
                                <td></td>
                                <td><p class="mb-0 text-right">Bill: {{ $customer->totalbill() }}</p></td>
                                <td><p class="mb-0 text-right">Paid: {{ $customer->paidbill() }}</p></td>
                                {{-- <td>
                                    <p class="mb-0 text-right">Due: {{ $customer->duebill() }}</p>
                                </td> --}}
                                <td><p class="mb-0 text-right">Due: {{ $customer->duebill() }}</p></td>
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
                new DataTable('#orderTable', {
                    layout: {
                        topStart: {
                            buttons: [ 'pdfHtml5']
                        }
                    }
                });



                $('#printbtn').click(function (e) {
                    $('#dateto').html(getToday());
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

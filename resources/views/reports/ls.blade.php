<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ledger Sales Report') }}
            </h2>
            <a href="{{route('customers.create')}}" class=" mt-2"><x-primary-button>New Ledger</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-scroll">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center print:hidden gap-y-2 sm:gap-y-0">
                    <div class="">
                        <form action="{{route('report.lsakes')}}" method="get" class="flex sm:gap-0 flex-wrap sm:flex-nowrap">

                            @csrf
                            @method('GET')
                            <x-text-input type="date" class="weekago" name="weekago" value="{{ old('weekago', $formdtae) }}"></x-text-input>
                            <span class="mx-2">To</span>
                            <x-text-input type="date" class="today" name="today" value="{{ old('today', $todate) }}"></x-text-input>
                            <x-primary-button id="" class="ml-2">Filter</x-primary-button>
                        </form>
                    </div>
                    <x-primary-button id="printbtn">Print</x-primary-button>
                </div>
                <div class="p-6 print:p-0 text-gray-900 printable print:min-w-full">
                    {{-- Print header --}}
                    <div class="p-6 print:p-0 print:flex justify-between items-center flex">
                        <div class="flex justify-start gap-5 items-center">
                            <img src="{{asset('images/ebo.png')}}" alt="" srcset="" class="w-24">
                            <div class="text-xs border border-gray-900 p-2">
                                <p>DC License: 10/2014</p>
                                <p>Doe License: 25562</p>
                                <p>e-TIN No: 628446302955</p>
                                <p>BIN No: 003936487-0801</p>
                            </div>

                        </div>
                        <div class="">
                            <h2 class="text-4xl font-bold uppercase">{{ __('Ledger Sales Report') }}</h2>
                            <div class="flex items-center justify-between">
                                <p class="">Date: <span id="dateform">{{date('d-m-Y', strtotime($formdtae))}}</span> to <span id="dateto">{{date('d-m-Y', strtotime($todate))}}</span></p>
                                <p class="text-lg">Last Challan: {{$cn}}</p>
                            </div>
                        </div>
                    </div>

                    <table class="table mb-0" id="orderTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th class="text-left">Date</th>
                                <th class="text-left">Customer</th>
                                <th class="text-right">Note</th>
                                <th class="text-right">Challan</th>
                                <th class="text-right">Grade</th>
                                <th class="text-right">Bricks</th>
                                <th class="text-right">Rate</th>
                                <th class="text-right">Grade</th>
                                <th class="text-right">Chips</th>
                                <th class="text-right">Rate</th>
                                <th class="text-right">Bill</th>
                                <th class="text-right">Paid</th>
                                <th class="text-right">Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="ligth ligth-data">
                                <td>{{$order->order_date}}</td>
                                <td class="text-left">
                                    @if ($order->customer)
                                    {{$order->customer->name}}
                                    @else
                                    Cash Sale
                                    @endif
                                </td>
                                <td class="text-right">{{$order->note ? $order->note : '' }}</td>
                                <td class="text-right">{{$order->chalan_number ? $order->chalan_number : ''}}</td>
                                <td class="text-right">
                                    @if ($order->brick_grade == 1)
                                    1
                                    @elseif ($order->brick_grade == 2)
                                    1.5
                                    @else
                                    Others
                                    @endif
                                </td>
                                <td class="text-right">{{$order->brick_qty }}</td>
                                <td class="text-right">{{$order->brick_up ? $order->brick_up : '' }}</td>
                                <td class="text-right">
                                    @if ($order->chips_grade == 1)
                                    3/4
                                    @elseif ($order->chips_grade == 2)
                                    Macadam
                                    @elseif ($order->chips_grade == 3)
                                    Bats
                                    @else
                                    Chips
                                    @endif
                                </td>
                                <td class="text-right">{{$order->chips_qty }}</td>
                                <td class="text-right">{{$order->chips_up ? $order->chips_up : '' }}</td>
                                <td class="text-right">{{$order->total_bill }}</td>
                                <td class="text-right">{{$order->paid_bill }}</td>
                                <td class="text-right">{{$order->due_bill}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-right">Bricks: {{ $orders->sum('brick_qty')}}</th>
                                <th></th>
                                <th></th>
                                <th class="text-right">Chips: {{ $orders->sum('chips_qty')}}</th>
                                <th></th>
                                <th class="text-right">Bill: {{ $orders->sum('total_bill')}}</th>
                                <th class="text-right">Paid: {{ $orders->sum('paid_bill')}}</th>
                                <th class="text-right">Due: {{ $orders->sum('due_bill')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <x-printfooter></x-printfooter>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="{{asset('js/legersales.js')}}"></script>
    </x-slot>
</x-app-layout>

<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Total Bricks and Chips Delivery') }}</h2>
            <a href="{{route('customers.create')}}" class="mt-2"><x-primary-button>New Ledger</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center print:hidden gap-y-2 sm:gap-y-0">
                    <div class="">
                        <form action="{{route('report.delivery')}}" method="get" class="flex sm:gap-0 flex-wrap sm:flex-nowrap">

                            @csrf
                            @method('GET')
                            <x-text-input type="date" class="weekago" name="weekago" value="{{date('Y-m-d', strtotime($formdtae))}}"></x-text-input>
                            <span class="mx-2">To</span>
                            <x-text-input type="date" class="today" name="today" value="{{date('Y-m-d', strtotime($todate))}}"></x-text-input>
                            <x-primary-button id="" class="ml-2">Filter</x-primary-button>
                        </form>
                    </div>
                    <x-primary-button id="printbtn">Print</x-primary-button>
                </div>
                <div class="p-6 pb-10 print:p-0 print:pb-40 print:max-h-screen text-gray-900 printable print:min-w-full">

                    {{-- Print header --}}
                    <div class="p-6 print:px-0 print:py-10 print:flex justify-between flex items-start">

                        <x-plogo></x-plogo>
                        <div class="">
                            <h2 class="text-4xl font-bold uppercase">{{ __('Bricks and Chips Delivery') }}</h2>
                            <div class="flex items-center justify-between">
                                <p class="">Date: <span id="dateform">{{date('d-m-Y', strtotime($formdtae))}}</span> to <span id="dateto">{{date('d-m-Y', strtotime($todate))}}</span></p>
                                <p class="text-lg">Last Challan: {{$cn}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-96 mx-auto flex justify-center">


                        <table class="border border-red-900 table mb-0 max-w-96" id="orderTable">

                            <tbody>
                                <tr class="border">
                                    <td>Total Bricks</td>
                                    <td class="text-right border">{{$totalbricks}}</td>
                                    <td class="text-right border">{{$totalbricks}}</td>
                                </tr>
                                <tr class="border">
                                    <td>Total Chips</td>
                                    <td class="text-right border">{{$totalchips}}</td>
                                    <td class="text-right border">{{$totalchips*10}}</td>
                                </tr>
                                <tr class="border">
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Total: {{$totalbricks+($totalchips*10)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <x-printfooter></x-printfooter>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="{{asset('js/delivery.js')}}"></script>
    </x-slot>
</x-app-layout>

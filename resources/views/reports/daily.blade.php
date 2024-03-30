<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Report') }}
            <a href="{{ route('customers.create') }}" class="ml-4"><x-primary-button>New Customer
                    Ledger</x-primary-button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 flex justify-between items-center print:hidden">
                    <div class="">
                        <form action="" method="post">
                            <x-text-input type="date" class="today"></x-text-input>
                            <x-primary-button id="dailyFilterBtn">Filter</x-primary-button>
                        </form>
                    </div>
                    <x-primary-button onclick="window.print();return false">Print</x-primary-button>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="p-6 print:flex justify-center items-center hidden ">
                        <h2 class="text-xl font-bold">{{ __('Due Customers') }}</h2>
                    </div>
                    <table class="table mb-0" id="orderTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Order Date</th>
                                <th>Transport</th>
                                <th>Type</th>
                                <th>Grade</th>
                                <th>Order Number.</th>
                                <th>Bricks</th>
                                <th>Chips</th>
                                <th>Rate</th>
                                <th>Bill</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th class="print:hidden">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="{{asset('js/dailyreport.js')}}"></script>
    </x-slot>
</x-app-layout>

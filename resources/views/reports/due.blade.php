<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Due Customers') }}
            <a href="{{route('customers.create')}}" class="ml-4"><x-primary-button>New Customer Ledger</x-primary-button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 flex justify-end print:hidden">
                    <x-primary-button onclick="window.print();return false">Print</x-primary-button>
                </div>
                <div class="">
                    <h2></h2>
                </div>
                <div class="p-6 text-gray-900">

                    <div class="p-6 print:p-0 print:flex justify-between items-center hidden">
                        <div class="flex justify-start gap-5 items-center">
                            <img src="{{asset('images/ebo.png')}}" alt="" srcset="" class="w-24">
                            <h2 class="text-3xl font-bold uppercase">{{ __('Due Report') }}</h2>
                        </div>
                        <div class="flex items-center">
                            <p>Date: <span id="datereport"></span></p>
                        </div>
                    </div>

                    <table class="table mb-0" id="customerTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>ID.</th>
                                <th>Name</th>
                                <th>Brick</th>
                                <th>Chips</th>
                                <th>Bill</th>
                                <th>Paid</th>
                                <th>Due</th>
                                {{-- <th class="print:hidden">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($customers as $customer)

                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td><a href="{{route('customers.show', $customer->id)}}">{{ $customer->name }}</a> </td>
                                <td>{{ $customer->bricks() }}</td>
                                <td>{{ $customer->chips() }}</td>
                                <td>{{ $customer->totalbill() }}</td>
                                <td>{{ $customer->paidbill() }}</td>
                                <td>{{ $customer->duebill() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Payable : {{$pay}}</td>
                                <td>Reciveable : {{$ric}}</td>
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
            // $('#customerTablef').DataTable({
            //     searching: false,
            //     paging: false,
            // });

            var d = new Date();
            var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
            $('#datereport').text(strDate);
        </script>

    </x-slot>
</x-app-layout>

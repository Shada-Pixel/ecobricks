<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Receivable and Payable Report') }}
            </h2>
            <a href="{{route('customers.create')}}" class="mt-2"><x-primary-button>New Ledger</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden print:shadow-none shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 flex justify-end print:hidden">
                    <x-primary-button id="printbtn">Print</x-primary-button>
                </div>

                <div class="p-6 pb-10 print:p-0 print:pb-40 print:max-h-screen text-gray-900 printable print:min-w-full">
                    {{-- Print header --}}
                    <div class="p-6 print:px-0 print:py-10 print:flex justify-between flex items-start">
                        <x-plogo></x-plogo>
                        <div class="">
                            <h2 class="text-4xl font-bold uppercase">{{ __('Receivable and Payable Report') }}</h2>
                            <div class="flex items-center justify-between">

                                <p class="text-lg">Date: <span id="datereport">{{date('d-m-Y', strtotime($targatedDate))}}</span></p>
                                <p class="text-lg">Last Challan: {{$cn}}</p>
                            </div>
                        </div>
                    </div>

                    <table class="border sp-table mb-0" id="customerTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Sl.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Bricks</th>
                                <th class="text-center">Chips</th>
                                <th class="text-center">Bill</th>
                                <th class="text-center">Paid</th>
                                <th class="text-center">Due</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($customers as $customer)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td class="text-left"><a href="{{route('customers.show', $customer->id)}}">{{ $customer->name }}</a> </td>
                                <td class="text-right">{{ $customer->bricks() }}</td>
                                <td class="text-right">{{ $customer->chips() }}</td>
                                <td class="text-right">{{ $customer->totalbill() }}</td>
                                <td class="text-right">{{ $customer->paidbill() }}</td>
                                <td class="text-right">{{ $customer->duebill() }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right font-semibold">Payable : {{$pay}}</td>
                                <td class="text-right font-semibold">Reciveable : {{$ric}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <x-printfooter></x-printfooter>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="{{asset('js/duereport.js')}}"></script>
    </x-slot>
</x-app-layout>

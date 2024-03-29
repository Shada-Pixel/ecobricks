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
                    <div class="p-6 print:flex justify-center items-center hidden ">
                        <h2 class="text-xl font-bold">{{ __('Due Customers') }}</h2>
                    </div>
                    <table class="table mb-0" id="">
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
                                {{-- <td class="print:hidden">
                                    <div class="flex gap-2 text-xl">
                                        <a class="bg-green-400 p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="{{ route('customers.show', $customer->id) }}"><i class="ri-eye-line mr-0"></i><span class="icon-[solar--eye-outline]"></span>
                                        <a class="bg-brick p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('customers.edit', $customer->id) }}"><i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="margin-bottom: 5px">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-500 p-2 h-10 rounded-sm flex justify-center items-center text-white" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
                                    </div>
                                </td> --}}
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
            new DataTable('#customerTable');
        </script>

    </x-slot>
</x-app-layout>

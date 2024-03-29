<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Orders') }}
            <a href="{{route('dashboard')}}" class="ml-4"><x-primary-button>New Order</x-primary-button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                        <tbody class="ligth-body">
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->transport }}</td>
                                <td>@if ($order->type == 1) F @else M @endif </td>
                                <td>@if ($order->brick_grade == 1) 1 @else 1.5 @endif </td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->brick_qty }}</td>
                                <td>{{ $order->chips_qty }}</td>
                                <td>{{ $order->brick_up }}</td>
                                <td>{{ $order->total_bill }}</td>
                                <td>{{ $order->paid_bill }}</td>
                                <td>{{ $order->due_bill }}</td>
                                <td class="print:hidden">
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
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>


        <script>
            new DataTable('#orderTable', {
                layout: {
                    topStart: {
                        buttons: [ 'pdfHtml5']
                    }
                }
            });
        </script>

    </x-slot>
</x-app-layout>

<x-app-layout>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" />
    </x-slot>

    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Orders') }}
            </h2>
            <a href="{{route('dashboard')}}" class="mt-2"><x-primary-button>New Order</x-primary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl print:max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Searching Div --}}
                    <div class="flex justify-center items-center">

                        <div class="bg-gray-300 p-2 mb-4 rounded-md inline-block max-w-lg mx-auto">
                            <form action="{{route('orders.index')}}" method="get" class="inline-block">
                                <!-- Order date -->
                                <div class="">
                                    <x-text-input id="search" class="flex-grow" name="search" required type="text"/>
                                    <x-primary-button class="" id="">
                                        {{ __('Search') }}
                                    </x-primary-button>
                                </div>
                            </form>
                            <a href="{{route('orders.index')}}">
                                <button class="inline-flex items-center px-2 sm:px-6 py-2 sm:py-4 bg-blue-800 border-none rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lgreen focus:bg-lgreen active:bg-lgreen focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Reset') }}
                                </button>
                            </a>
                            {{-- <p class="mt-2 text-xs text-center">Search with Bill or Chalan</p> --}}
                        </div>
                    </div>
                    <table class="table mb-0" id="orderTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Order Date</th>
                                <th>Chalan</th>
                                <th>Type</th>
                                <th>Grade</th>
                                <th>O. Nub.</th>
                                <th>Bricks</th>
                                <th>B.Rate</th>
                                <th>Chips</th>
                                <th>C.Rate</th>
                                <th>Bill</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th class="print:hidden">Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{date('d-M-y', strtotime($order->order_date))}}</td>
                                <td>{{ $order->chalan_number }}</td>
                                <td>@if ($order->type == 1) F @else M @endif </td>
                                <td>@if ($order->brick_grade == 1) 1 @else 1.5 @endif </td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->brick_qty }}</td>
                                <td>{{ $order->brick_up }}</td>
                                <td>{{ $order->chips_qty }}</td>
                                <td>{{ $order->chips_up }}</td>
                                <td>{{ $order->total_bill }}</td>
                                <td>{{ $order->paid_bill }}</td>
                                <td>{{ floor($order->due_bill) }}</td>
                                <td class="print:hidden">
                                    <div class="flex gap-2 text-xl">
                                        <a class="bg-green-400 p-2 h-10 rounded-sm flex justify-center items-center text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="{{ route('orders.show', $order->id) }}"><i class="ri-eye-line mr-0"></i><span class="icon-[solar--eye-outline]"></span></a>
                                        <a class="bg-brick p-2 rounded-sm flex justify-center items-center text-white text-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('orders.edit', $order->id) }}"><i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="margin-bottom: 5px">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-500 p-2 rounded-sm text-sm flex justify-center items-center text-white deleteBtn"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{-- Pagination --}}
                        {{-- {{ $orders->links() }} --}}
                        {{ $orders->withQueryString()->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        {{-- Sweet alert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // new DataTable('#orderTable');

            // var datatablelist = $('#userTable').DataTable();

            $('.deleteBtn').click(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                    background: 'rgba(255, 255, 255, 1)',
                    padding: '20px',
                    confirmButtonColor: '#0db8a6',
                }).then((result) => {
                    if (result.value) {
                        $(this).closest('form').submit();
                    }
                });
            });

        </script>

    </x-slot>
</x-app-layout>

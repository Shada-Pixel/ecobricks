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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                <p>
                    <span>Bricks Quentity : {{$order->brick_qty ? $order->brick_qty : 0}}</span>
                    <span>brick_grade : {{$order->brick_grade ? $order->brick_grade : 0}}</span>
                    <span>brick_up : {{$order->brick_up ? $order->brick_up : 0}}</span>
                    <span>brick_total : {{$order->brick_total ? $order->brick_total : 0}}</span>
                </p>
                <p>
                    <span>Chips Quentity : {{$order->chips_qty ? $order->chips_qty : 0}}</span>
                    <span>chips_grade : {{$order->chips_grade ? $order->chips_grade : 0}}</span>
                    <span>chips_up : {{$order->chips_up ? $order->chips_up : 0}}</span>
                    <span>chips_total : {{$order->chips_total ? $order->chips_total : 0}}</span>
                </p>
                <p>
                    <span>order_number : {{$order->order_number ? $order->order_number : 0}}</span>
                    <span>transport : {{$order->transport ? $order->transport : 0}}</span>
                    <span>type : {{$order->type ? $order->type : 0}}</span>
                    <span>sub_total_bill : {{$order->sub_total_bill ? $order->sub_total_bill : 0}}</span>
                    <span>total_bill : {{$order->total_bill ? $order->total_bill : 0}}</span>
                    <span>paid_bill : {{$order->paid_bill ? $order->paid_bill : 0}}</span>
                    <span>due_bill : {{$order->due_bill ? $order->due_bill : 0}}</span>
                    <span>note : {{$order->note ? $order->note : 0}}</span>
                    <span>desc : {{$order->desc ? $order->desc : 0}}</span>
                    <span>discount : {{$order->discount ? $order->discount : 0}}</span>
                    <span>chalan_number : {{$order->chalan_number ? $order->chalan_number : 0}}</span>
                    <span>payment_type : {{$order->payment_type ? $order->payment_type : 0}}</span>
                    <span>status : {{$order->status ? $order->status : 0}}</span>
                    <span>order_date : {{$order->order_date ? $order->order_date : 0}}</span>
                    <span>customer : {{$order->customer ? $order->customer->name : 0}}</span>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-6">

                    <x-primary-button id="printbtn">Print</x-primary-button>
                </div>
                <div class="printable">
                    {{-- office copy --}}
                    <div class="">
                        <div class="px-6 text-gray-900">
                            {{-- Print header --}}
                            <div class="px-6 print:px-0 print:py-2 grid grid-cols-4">

                                <div class="">
                                    <img src="{{asset('images/ebo.png')}}" alt="" srcset="" class="w-36">
                                    <p>Challan No: {{$order->chalan_number ? $order->chalan_number : ''}}</p>
                                </div>
                                <div class="col-span-2">
                                    <div class="flex flex-col items-center justify-center">
                                        <h2 class="text-xl font-bold uppercase text-right bg-black text-white px-2 rounded-full">{{ __('Challan') }}</h2>
                                        <h2 class="text-4xl font-bold uppercase text-right">{{ __('Eco Bricks') }}</h2>
                                        <p class="inline-block bg-black text-white px-4 rounded-full">Manufacturer of high quality Forma and machine bricks</p>
                                        <p>House: 30, Road: 06, Shonadanga R/A 1st phase, Khulna-9000.</p>
                                        <p>Factory : Andhariya, Batiaghata, Khulna.</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p>Office: +8801726887015<br>: +8801715448085</p>
                                    <p>Factory: +88019536352603</p>
                                    <p>Email: nazueco@gmail.com</p>
                                    <p class="mt-4">Date: <span id="dateform">{{date('d-m-Y', strtotime($order->created_at))}}</span></p>
                                </div>
                            </div>

                            <div class="px-4 text-gray-950">
                                @if ($order->customer)
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->name ? $order->customer->name : ''}}</span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->address ? $order->customer->address : ''}}</span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks ({{$order->brick_qty}}) Chips ({{$order->chips_qty}})</span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>

                                @else
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks           Chips             </span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>
                                @endif
                            </div>

                            <div class="px-6 mt-12 text-gray-950 flex justify-between items-start">
                                <div class="">
                                    <hr>
                                    <p>Receiver Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Buyer Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Manager Signature</p>
                                </div>
                            </div>
                        </div>

                        {{-- cutting line --}}
                        <div class="relative my-4">
                            <hr class="border-dashed">
                            <img src="{{asset('images/sci.svg')}}" alt="" srcset="" class="w-4 fill-gray-400/40 absolute left-6 top-[-3px]">
                        </div>
                    </div>
                    {{-- office copy --}}
                    <div class="">
                        <div class="px-6 text-gray-900">
                            {{-- Print header --}}
                            <div class="px-6 print:px-0 print:py-2 grid grid-cols-4">

                                <div class="">
                                    <img src="{{asset('images/ebo.png')}}" alt="" srcset="" class="w-36">
                                    <p>Challan No: {{$order->chalan_number ? $order->chalan_number : ''}}</p>
                                </div>
                                <div class="col-span-2">
                                    <div class="flex flex-col items-center justify-center">
                                        <h2 class="text-xl font-bold uppercase text-right bg-black text-white px-2 rounded-full">{{ __('Challan') }}</h2>
                                        <h2 class="text-4xl font-bold uppercase text-right">{{ __('Eco Bricks') }}</h2>
                                        <p class="inline-block bg-black text-white px-4 rounded-full">Manufacturer of high quality Forma and machine bricks</p>
                                        <p>House: 30, Road: 06, Shonadanga R/A 1st phase, Khulna-9000.</p>
                                        <p>Factory : Andhariya, Batiaghata, Khulna.</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p>Office: +8801726887015<br>: +8801715448085</p>
                                    <p>Factory: +88019536352603</p>
                                    <p>Email: nazueco@gmail.com</p>
                                    <p class="mt-4">Date: <span id="dateform">{{date('d-m-Y', strtotime($order->created_at))}}</span></p>
                                </div>
                            </div>

                            <div class="px-4 text-gray-950">
                                @if ($order->customer)
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->name ? $order->customer->name : ''}}</span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->address ? $order->customer->address : ''}}</span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks ({{$order->brick_qty}}) Chips ({{$order->chips_qty}})</span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>

                                @else
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks           Chips             </span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>
                                @endif
                            </div>

                            <div class="px-6 mt-12 text-gray-950 flex justify-between items-start">
                                <div class="">
                                    <hr>
                                    <p>Receiver Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Buyer Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Manager Signature</p>
                                </div>
                            </div>
                        </div>

                        {{-- cutting line --}}
                        <div class="relative my-4">
                            <hr class="border-dashed">
                            <img src="{{asset('images/sci.svg')}}" alt="" srcset="" class="w-4 fill-gray-400/40 absolute left-6 top-[-3px]">
                        </div>
                    </div>
                    {{-- office copy --}}
                    <div class="">
                        <div class="px-6 text-gray-900">
                            {{-- Print header --}}
                            <div class="px-6 print:px-0 print:py-2 grid grid-cols-4">

                                <div class="">
                                    <img src="{{asset('images/ebo.png')}}" alt="" srcset="" class="w-36">
                                    <p>Challan No: {{$order->chalan_number ? $order->chalan_number : ''}}</p>
                                </div>
                                <div class="col-span-2">
                                    <div class="flex flex-col items-center justify-center">
                                        <h2 class="text-xl font-bold uppercase text-right bg-black text-white px-2 rounded-full">{{ __('Challan') }}</h2>
                                        <h2 class="text-4xl font-bold uppercase text-right">{{ __('Eco Bricks') }}</h2>
                                        <p class="inline-block bg-black text-white px-4 rounded-full">Manufacturer of high quality Forma and machine bricks</p>
                                        <p>House: 30, Road: 06, Shonadanga R/A 1st phase, Khulna-9000.</p>
                                        <p>Factory : Andhariya, Batiaghata, Khulna.</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p>Office: +8801726887015<br>: +8801715448085</p>
                                    <p>Factory: +88019536352603</p>
                                    <p>Email: nazueco@gmail.com</p>
                                    <p class="mt-4">Date: <span id="dateform">{{date('d-m-Y', strtotime($order->created_at))}}</span></p>
                                </div>
                            </div>

                            <div class="px-4 text-gray-950">
                                @if ($order->customer)
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->name ? $order->customer->name : ''}}</span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">{{$order->customer->address ? $order->customer->address : ''}}</span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks ({{$order->brick_qty}}) Chips ({{$order->chips_qty}})</span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>

                                @else
                                <div class="">
                                    <p class="flex py-[2px]">Name: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Address: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Destination: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="flex py-[2px]">Quantity: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow">Bricks           Chips             </span></p>
                                    <p class="flex py-[2px] ">Truck / Trolley / Troller: <span class="pl-4 border-b border-dashed border-gray-500 flex-grow"></span></p>
                                    <p class="mt-2 font-semibold">I received the goods mentioned above.</p>
                                </div>
                                @endif
                            </div>

                            <div class="px-6 mt-12 text-gray-950 flex justify-between items-start">
                                <div class="">
                                    <hr>
                                    <p>Receiver Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Buyer Signature</p>
                                </div>
                                <div class="">
                                    <hr>
                                    <p>Manager Signature</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-slot name="pagescript">
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="{{asset('js/challan.js')}}"></script>
    </x-slot>
</x-app-layout>

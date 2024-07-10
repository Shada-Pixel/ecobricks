<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dblue leading-tight">
            {{ __('Files') }}
        </h2>
    </x-slot>

    <x-slot name="headerstyle">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" /> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-4 hidden sm:block">
                <div class="p-6">
                    <div class="flex justify-end gap-4">
                        <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('files.download', $file->id) }}"><button type="submit" class="bg-red-500 p-2 rounded-sm text-sm flex justify-center items-center text-white deleteBtn"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 19h18v2H3zM13 9h7l-8 8l-8-8h7V1h2z"/></svg></button>

                        </a>
                        <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="margin-bottom: 5px">
                            @method('delete')
                            @csrf
                            <button type="submit" class="bg-red-500 p-2 rounded-sm text-sm flex justify-center items-center text-white deleteBtn"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                        </form>
                    </div>
                    <div class="container mt-5">
                        <h2>{{ $file->name }}</h2>
                        @if ($file->mime_type == 'application/pdf')
                            <embed src="{{ asset($file->path) }}" type="application/pdf" width="100%" height="600px" />
                        @elseif ( in_array($file->mime_type, ['image/jpeg', 'image/jpg', 'image/png']))
                            <img src="{{ asset($file->path) }}" alt="" srcset="" width="100%" >
                        @else
                            <p>This file cannot be previewed. Please download it to view.</p>
                            <a href="{{ Storage::url($file->path) }}" target="_blank" class="btn btn-primary">Download</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="pagescript">

    </x-slot>
</x-app-layout>

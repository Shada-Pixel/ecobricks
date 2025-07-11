<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dblue leading-tight">
            {{ 'Edit Note - '.$note->title }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-3xl mx-auto">
            <div class="">

                <form action="{{ route('notes.update', $note) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <x-input-label for="title" class="form-label" :value="__('Title')"/>
                        <x-text-input type="text" name="title" id="title" class="w-full" value="{{ old('title', $note->title) }}" required />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="body" class="form-label":value="__('Body')" />
                        <textarea name="body" id="body" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-1" rows="5">{{ old('body', $note->body) }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4 ">
                        <x-primary-button class="ms-4" id="" type="submit">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add/Edit Office') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('offices.store') }}" method="POST">
            @csrf
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <input type="hidden" value="{{ old('id', $office->id) }}" name="id">
                <div class="">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <x-forms.input
                            type="text"
                            id="exampleFormControlInput1"
                            placeholder="Enter Name"
                            value="{{ old('name', $office->name) }}"
                            name="name"></x-forms.input>
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Office:</label>
                        <x-forms.input
                            type="text"
                            id="exampleFormControlInput1"
                            placeholder="Enter Short Name/Acronym"
                            value="{{ old('short_name', $office->short_name) }}"
                            name="short_name"></x-forms.input>
                        @error('short_name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button type="submit" class="bg-blue-900 text-white rounded px-4">
                        Save
                    </button>
                </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <a href="{{ route('offices.index') }}" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Go Back
                    </a>
                </span>
            </div>
        </form>
    </div>
</x-app-layout>

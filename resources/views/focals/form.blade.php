<x-app-layout>
    <x-slot name="header">
        <x-page-title title="{{ __('Add/Edit Focal') }}"></x-page-title>
    </x-slot>

    <div>
        <form action="{{ route('focals.store') }}" method="POST">
            @csrf
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <input type="hidden" value="{{ old('id', $focal->id) }}" name="id">
                <div class="">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Focal Type:</label>
                        <x-forms.select
                            id="exampleFormControlInput1"
                            selected="{{ old('focal_type_id', $focal->focal_type_id) }}"
                            :options="$focal_types"
                            name="focal_type_id"></x-forms.select>
                        @error('focal_type_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Office:</label>
                        <x-forms.select
                            id="exampleFormControlInput1"
                            selected="{{ old('office_id', request()->query('office_id') ? request()->query('office_id') : $focal->office_id)  }}"
                            :options="$offices"
                            name="office_id"></x-forms.select>
                        @error('office_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Full Name:</label>
                        <x-forms.input
                            placeholder="e.g. Juan dela Cruz"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('name', $focal->name) }}"
                            name="name"></x-forms.input>
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Designation:</label>
                        <x-forms.input
                            placeholder="e.g. Planning Officer"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('designation', $focal->designation) }}"
                            name="designation"></x-forms.input>
                        @error('designation') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <x-forms.input
                            placeholder="e.g. email@example.com"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('email', $focal->email) }}"
                            name="email"></x-forms.input>
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Tel. #:</label>
                        <x-forms.input
                            placeholder="e.g. (02) 1234-5678"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('telephone_number', $focal->telephone_number) }}"
                            name="telephone_number"></x-forms.input>
                        @error('telephone_number') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Fax #:</label>
                        <x-forms.input
                            placeholder="e.g. (02) 1234-5678"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('fax_number', $focal->fax_number) }}"
                            name="fax_number"></x-forms.input>
                        @error('fax_number') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Mobile #:</label>
                        <x-forms.input
                            placeholder="e.g. 09123456789"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('mobile_number', $focal->mobile_number) }}"
                            name="mobile_number"></x-forms.input>
                        @error('mobile_number') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Viber #:</label>
                        <x-forms.input
                            placeholder="e.g. 09123456789"
                            type="text"
                            id="exampleFormControlInput1"
                            value="{{ old('viber_number', $focal->viber_number) }}"
                            name="viber_number"></x-forms.input>
                        @error('viber_number') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Roadmaps Assigned:</label>
                        @foreach($roadmaps as $item)
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input
                                        class="focus:ring-indigo-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                                        id="roadmaps{{ $item->id }}"
                                        type="checkbox"
                                        name="roadmaps[]"
                                        value="{{ $item->id }}"
                                        @if(request()->query('roadmap_id') && $item->id == request()->query('roadmap_id')) {{ 'checked' }} @endif
                                        @if(in_array($item->id, old('roadmaps', $focal->roadmaps->pluck('id')->toArray() ))) {{ 'checked' }} @endif>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="{{ $item->commodity->name ?? '' }}" class="font-medium text-gray-700">{{ $item->commodity->name ?? '' }}</label>
                                </div>
                            </div>
                        @endforeach
                        @error('roadmaps') <span class="text-red-500">{{ $message }}</span>@enderror
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
                    <a href="{{ route('focals.index') }}" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Go Back
                    </a>
                </span>
            </div>
        </form>
    </div>
</x-app-layout>

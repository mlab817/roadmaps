<x-app-layout>
    <x-slot name="header">
        <x-page-title title="{{ __('Add/Edit Progress Report') }}"></x-page-title>
    </x-slot>

    <div>
        <form action="{{ route('progress-reports.store') }}" method="POST">
            @csrf
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <input type="hidden" value="{{ old('id', $progress_report->id) }}" name="id">
                <div class="">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <x-forms.select
                            id="exampleFormControlInput1"
                            selected="{{ old('office_id', $progress_report->office_id) }}"
                            :options="$offices"
                            name="office_id"></x-forms.select>
                        @error('office_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="exampleFormControlInput2" label="Report Period"></x-forms.label>
                        <x-forms.select
                            id="exampleFormControlInput1"
                            :options="$report_periods"
                            selected="{{ old('report_period_id', $progress_report->report_period_id) }}"
                            name="report_period_id"></x-forms.select>
                        @error('report_period_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="exampleFormControlInput2" label="Attachment"></x-forms.label>
                        <x-forms.input
                            id="exampleFormControlInput1"
                            type="file"
                            value="{{ old('attachment', $progress_report->attachment) }}"
                            name="attachment"
                            accept="application/pdf,.pdf"
                            ></x-forms.input>
                        @error('attachment') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-forms.label for="exampleFormControlInput2" label="Remarks"></x-forms.label>
                        <x-forms.textarea
                            id="exampleFormControlInput1"
                            value="{{ old('remarks', $progress_report->remarks) }}"
                            name="remarks"></x-forms.textarea>
                        @error('remarks') <span class="text-red-500">{{ $message }}</span>@enderror
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
                    <a href="{{ route('progress-reports.index') }}" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Go Back
                    </a>
                </span>
            </div>
        </form>
    </div>
</x-app-layout>

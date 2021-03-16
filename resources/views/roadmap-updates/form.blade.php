<x-app-layout>
    <x-slot name="header">
        <x-page-title title="{{ __('Roadmap Updates : ') . $roadmap->commodity->name }}"></x-page-title>
    </x-slot>

    <div>
        @if($errors->any())
            <div class="text-red-500">
                <p class="font-weight-bold">The following errors occurred:</p>
                <ul class="mx-6 list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('roadmap-updates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $roadmap_update->id }}" name="id">
            <input type="hidden" value="{{ request()->query('roadmap_id') ? request()->query('roadmap_id') : $roadmap_update->roadmap_id }}" name="roadmap_id">
            <div class="mb-4">
                <x-forms.label label="Progress Report"></x-forms.label>
                <x-forms.select
                    selected="{{ old('progress_report_id', $roadmap_update->progress_report_id) }}"
                    name="progress_report_id"
                    :options="$progress_reports"></x-forms.select>
                @error('progress_report_id') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Participants Involved"></x-forms.label>
                <x-forms.textarea name="participants_involved">{{ old('participants_involved', $roadmap_update->participants_involved) }}</x-forms.textarea>
                @error('participants_involved') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Activities Done"></x-forms.label>
                <x-forms.textarea name="activities_done">{{ old('activities_done', $roadmap_update->activities_done) }}</x-forms.textarea>
                @error('activities_done') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Ongoing Activities"></x-forms.label>
                <x-forms.textarea name="activities_ongoing">{{ old('activities_ongoing', $roadmap_update->activities_ongoing) }}</x-forms.textarea>
                @error('activities_ongoing') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Overall Status"></x-forms.label>
                <x-forms.textarea name="overall_status">{{ old('overall_status', $roadmap_update->overall_status) }}</x-forms.textarea>
                @error('overall_status') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Date (as of)"></x-forms.label>
                <x-forms.input type="date" name="report_date" value="{{ old('report_date', $roadmap_update->report_date) }}"></x-forms.input>
                @error('report_date') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Remarks"></x-forms.label>
                <x-forms.textarea name="remarks">{{ old('remarks', $roadmap_update->remarks) }}</x-forms.textarea>
                @error('remarks') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <x-forms.label label="Attachment (PDF file up to 20MB)"></x-forms.label>
                <x-forms.input
                    id="attachment"
                    type="file"
                    name="attachment"
                    accept="application/pdf, .pdf"></x-forms.input>
                @error('attachment') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="flex flex-row-reverse">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>

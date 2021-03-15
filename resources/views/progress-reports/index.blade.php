<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Progress Reports"></x-page-title>
    </x-slot>

    <div>
        <div class="my-3">
            <a href="{{ route('progress-reports.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        <table class="table-fixed min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-sm tracking-wide">ID</th>
                    <th class="px-4 py-2 text-sm tracking-wide">Office</th>
                    <th class="px-4 py-2 text-sm tracking-wide">Report Period (ending)</th>
                    <th class="px-4 py-2 text-sm tracking-wide">Attachment</th>
                    <th class="px-4 py-2 text-sm tracking-wide">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progress_reports as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->office->name ?? '' }}</td>
                        <td>{{ $item->report_period->name ?? '' }}</td>
                        <td>{{ $item->upload->title ?? '' }}</td>
                        <td>{{ $item->remarks }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

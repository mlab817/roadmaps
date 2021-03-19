<table class="table-fixed w-full">
    <thead>
    <tr class="bg-gray-100">
        <x-tables.th>Office/Roadmap</x-tables.th>
        <x-tables.th>Date Started</x-tables.th>
        <x-tables.th>Participants Involved</x-tables.th>
        <x-tables.th>Activities Done</x-tables.th>
        <x-tables.th>Ongoing Activities</x-tables.th>
        <x-tables.th>Overall Status</x-tables.th>
        <x-tables.th>As of</x-tables.th>
        <x-tables.th>Attachment</x-tables.th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
    @forelse($offices as $office)
        <tr>
            <td class="items-start px-3 py-3 text-xs">{{ $office->name }}</td>
            <td class="items-start px-9 py-3 text-xs" colspan="5"></td>
            <td class="items-start px-3 py-3 text-xs text-center">{{ $office->latest_report->report_period->name ?? '' }}</td>
            <td class="items-start px-3 py-3 text-xs text-center">
                @if($office->latest_report && $office->latest_report->attachment_url)
                    <a href="{{ $office->latest_report->attachment_url ?? '#' }}" target="_blank">
                        <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </td>
        </tr>
        @forelse($office->roadmaps as $rm)
            <tr>
                <td class="px-6 py-3 text-xs align-top">
                    {{ $rm->commodity->name ?? '' }}
                </td>
                <td class="px-6 py-3 text-xs align-top">
                    {{ $rm->start_date }}
                </td>
                <td class="px-3 py-3 text-xs align-top">
                    {!! nl2br($rm->latest_update->participants_involved ?? '') !!}
                </td>
                <td class="px-3 py-3 text-xs align-top">
                    {!! nl2br($rm->latest_update->activities_done ?? '')  !!}
                </td>
                <td class="px-3 py-3 text-xs align-top">
                    {!! nl2br($rm->latest_update->activities_ongoing ?? '') !!}
                </td>
                <td class="px-3 py-3 text-xs align-top">
                    {!! nl2br($rm->latest_update->overall_status ?? '') !!}
                </td>
                <td class="items-start py-3 text-xs text-center align-top">
                    {{ $rm->latest_update && $rm->latest_update->report_date ? \Carbon\Carbon::make($rm->latest_update->report_date)->format('M d, Y') : '' }}
                </td>
                <td class="items-start py-3 text-xs text-center align-top">
                            <span class="inline-block items-start">
                                @if($rm->latest_update && $rm->latest_update->attachment_url)
                                    <a href="{{ $rm->latest_update->attachment_url }}" target="_blank">
                                        <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif
                            </span>
                </td>
            </tr>
        @empty
            <tr>
                <td class="px-6 py-3 text-xs text-center text-red-500" colspan="8">No roadmaps found</td>
            </tr>
        @endforelse
    @empty
        <tr>
            <td class="px-6 py-3 text-xs text-center text-red-500" colspan="8">No offices found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<table class="table-fixed w-full">
    <thead>
        <tr class="bg-gray-100">
            <th>Office/Roadmap</th>
            <th>Date Started</th>
            <th>Participants Involved</th>
            <th>Activities Done</th>
            <th>Ongoing Activities</th>
            <th>Overall Status</th>
            <th>As of</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
    @foreach($offices as $office)
        <tr>
            <td class="items-start px-3 py-3 text-xs">{{ $loop->index + 1 . '. ' . $office->name }}</td>
            <td class="items-start px-9 py-3 text-xs" colspan="5"></td>
            <td class="items-start px-3 py-3 text-xs text-center">{{ $office->latest_report->report_period->name ?? '' }}</td>
        </tr>
        @foreach($office->roadmaps as $rm)
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
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>

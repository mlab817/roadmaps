<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Office/Roadmap</th>
                <th>Date Started</th>
                <th>Participants Involved</th>
                <th>Activities Done</th>
                <th>Ongoing Activities</th>
                <th>Overall Status</th>
                <th>As of</th>
            </tr>
        </thead>
        <tbody>
        @foreach($offices as $office)
            <tr>
                <td>{!! $loop->index + 1 . '. ' . $office->name  !!}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $office->latest_report->report_period->name ?? '' }}</td>
            </tr>
            @foreach($office->roadmaps as $rm)
                <tr>
                    <td>
                        {!! $rm->commodity->name ?? '' !!}
                    </td>
                    <td>
                        {!! $rm->start_date  !!}
                    </td>
                    <td>
                        {!! preg_replace("/[^A-Za-z0-9.():,\/\n ]/", '', nl2br($rm->latest_update->participants_involved ?? '')) !!}
                    </td>
                    <td>
                        {!! preg_replace("/[^A-Za-z0-9.():,\/\n ]/", '', nl2br($rm->latest_update->activities_done ?? '')) !!}
                    </td>
                    <td>
                        {!! preg_replace("/[^A-Za-z0-9.():,\/\n ]/", '', nl2br($rm->latest_update->activities_ongoing ?? '')) !!}
                    </td>
                    <td>
                        {!! preg_replace("/[^A-Za-z0-9.():,\/\n ]/", '', nl2br($rm->latest_update->overall_status ?? '')) !!}
                    </td>
                    <td>
                        {!! $rm->latest_update && $rm->latest_update->report_date ? \Carbon\Carbon::make($rm->latest_update->report_date)->format('M d, Y') : ''  !!}
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Roadmap Updates"></x-page-title>
    </x-slot>

    <div>
        <form action="{{ route('roadmap-updates.index') }}" method="GET">
            <div class="py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <select
                        id="filter_period"
                        :options="$report_periods"
                        name="report_period_id"
                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                        <option value="">Select Report Period</option>
                        @foreach($report_periods as $item)
                            <option value="{{ $item->value }}" @if(request()->query('report_period_id') == $item->value) {{ 'selected' }} @endif>{{ $item->label }}</option>
                        @endforeach
                    </select>
                    <div class="ml-4 flex-shrink-0">
                        <button class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-center h-full py-2 px-4 text-white sm:text-sm rounded-md" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-50">
                    <x-tables.th>Report Period</x-tables.th>
                    <x-tables.th>Participants Involved</x-tables.th>
                    <x-tables.th>Activities Done</x-tables.th>
                    <x-tables.th>Activities Ongoing</x-tables.th>
                    <x-tables.th>Overall Status</x-tables.th>
                    <x-tables.th>Attachment</x-tables.th>
                    <x-tables.th></x-tables.th>
                </tr>
            </thead>
            <tbody class="bg-white divide-gray-500">
            @forelse($roadmap_updates as $item)
                <tr>
                    <td class="px-6 py-3 text-sm text-center">
                        {{ $item->progress_report->report_period->name ?? '' }}
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        {{ $item->participants_involved }}
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        {{ $item->activities_done }}
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        {{ $item->activities_ongoing }}
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        {{ $item->overall_status }}
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        <a class="text-blue-500 hover:text-blue-900" href="{{ $item->attachment_url }}" target="_blank">View</a>
                    </td>
                    <td class="px-6 py-3 text-sm text-center">
                        <a href="{{ route('roadmap-updates.edit', ['roadmap_update' => $item->id]) }}" class="text-blue-500 text-blue-900">Edit</a> |
                        <form class="inline inline-flex" action="{{ route('roadmap-updates.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-3 text-sm text-center">No items found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {{ $roadmap_updates->links() }}
        </div>
    </div>
</x-app-layout>

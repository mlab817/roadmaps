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
                    <th class="px-4 py-2 text-sm tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($progress_reports as $item)
                    <tr>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->office->name ?? '' }}</td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->report_period->name ?? '' }}</td>
                        <td class="px-4 py-2 text-sm text-center">
                            <a class="text-blue-500 hover:text-blue-900" href="{{ $item->attachment_url }}" target="_blank">Download</a>
                        </td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->remarks }}</td>
                        <td class="px-4 py-2 text-sm text-center">
                            <a href="{{ route('progress-reports.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('progress-reports.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-3 text-sm text-center">No items found. Click on Add New to add a new entry.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

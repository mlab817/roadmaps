<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Progress Reports"></x-page-title>
    </x-slot>

    <div>
        @admin
        <div class="my-3">
            <a href="{{ route('progress-reports.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        @endadmin
        <table class="table-fixed min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">Office</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">Report Period (ending)</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">Attachment</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">Remarks</th>
                    @admin
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">Actions</th>
                    @endadmin
                </tr>
            </thead>
            <tbody>
                @forelse($progress_reports as $item)
                    <tr>
                        <td class="px-6 py-3 text-xs text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-xs text-center">{{ $item->office->name ?? '' }}</td>
                        <td class="px-6 py-3 text-xs text-center">{{ $item->report_period->name ?? '' }}</td>
                        <td class="px-6 py-3 text-xs text-center">
                            <a class="text-blue-500 hover:text-blue-900" href="{{ $item->attachment_url }}" target="_blank">View</a>
                        </td>
                        <td class="px-6 py-3 text-xs text-center">{{ $item->remarks }}</td>
                        @admin
                        <td class="px-6 py-3 text-xs text-center">
                            <a href="{{ route('progress-reports.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('progress-reports.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                        @endadmin
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-3 text-xs text-center">No items found. Click on Add New to add a new entry.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {{ $progress_reports->links() }}
        </div>
    </div>
</x-app-layout>

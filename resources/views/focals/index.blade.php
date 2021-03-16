<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Focals"></x-page-title>
    </x-slot>

    <div>
        @admin
        <div class="my-3">
            <a href="{{ route('focals.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        @endadmin
        <table class="table-fixed min-w-full divide-y">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Roadmaps Handled</th>
                    @admin
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    @endadmin
                </tr>
            </thead>
            <tbody class="bg-white divide-gray-500">
                @forelse($focals as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->focal_type->name ?? '' }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->office->name ?? '' }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->email }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->viber_number }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->roadmaps->pluck('commodity.name')->join(', ') }}</td>
                        @admin
                        <td class="px-6 py-3 text-sm text-center">
                            <a href="{{ route('focals.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('focals.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                        @endadmin
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-3 text-sm text-center">No items found. Click on Add New to add a new entry.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

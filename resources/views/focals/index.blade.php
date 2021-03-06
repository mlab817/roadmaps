<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Focals"></x-page-title>
    </x-slot>

    <div>
        <div class="my-3 flex flex-nowrap flex-row items-center">
            <div class="flex-1 items-center">
                <a href="{{ route('focals.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
            </div>
            <div class="flex">
                <form class="flex-nowrap" action="{{ route('focals.index') }}" method="GET">
                    <x-forms.input
                        value="{{ old('search', request()->query('search')) }}"
                        name="search"
                        placeholder="Search...">
                    </x-forms.input>
                </form>
            </div>
        </div>
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
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
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
                        <td class="px-6 py-3 text-sm text-center">
                            @foreach($item->roadmaps as $roadmap)
                                <a class="text-blue-500 hover:text-blue-900" href="{{ route('roadmaps.show', $roadmap->id) }}">{{ $roadmap->commodity->name ?? '' }}</a> <br/>
                            @endforeach
                        </td>
                        <td class="px-6 py-3 text-sm text-center">
                            <a href="{{ route('focals.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('focals.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-3 text-sm text-center">No items found. Click on Add New to add a new entry.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {{ $focals->links() }}
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Permissions"></x-page-title>
    </x-slot>

    <div>
        <form class="mb-3" action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <x-forms.input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required></x-forms.input>
                    <div class="ml-4 flex-shrink-0">
                        <button class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-center h-full py-2 px-4 text-white sm:text-sm rounded-md" type="submit">Add</button>
                    </div>
                </div>
            </div>
            @error('name') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </form>
        <table class="table-fixed min-w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">No.</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Guard</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($permissions as $item)
                <tr>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->guard_name }}</td>
                    <td class="px-6 py-3 whitespace-nowrap text-sm text-center">
{{--                        <a href="{{ route('permissions.edit', $item->id) }}" class="text-blue-500">Edit</a> |--}}
                        <form class="inline" action="{{ route('permissions.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-3 text-sm text-center">No items found. Click on Add New to add a new entry.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {!! $permissions->links() !!}
        </div>
    </div>
</x-app-layout>

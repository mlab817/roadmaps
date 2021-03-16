<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offices') }}
        </h2>
    </x-slot>

    <div>
        @admin
        <div class="my-3">
            <a href="{{ route('offices.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        @endadmin
        <table class="min-w-full table-fixed">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Short Name</th>
                    @admin
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    @endadmin
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($offices as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->short_name }}</td>
                        @admin
                        <td class="px-6 py-3 text-sm text-center">
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('offices.edit', $item->id) }}">Edit</a> |
                            <form class="inline" action="{{ route('offices.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </td>
                        @endadmin
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2">
            {{ $offices->links() }}
        </div>
    </div>
</x-app-layout>

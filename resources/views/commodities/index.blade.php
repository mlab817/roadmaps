<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commodities') }}
        </h2>
    </x-slot>

    <div>
        @if(session('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold mb-2 px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        @admin
        <div class="my-3">
            <a href="{{ route('commodities.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        @endadmin

        <table class="table-fixed min-w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">No.</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office
                @admin
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                @endadmin
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($commodities as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->office ? $item->office->name : '' }}</td>
                        @admin
                        <td class="px-6 py-3 whitespace-nowrap text-sm text-center">
                            <a href="{{ route('commodities.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('commodities.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                        @endadmin
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-sm text-center">No items found. Click on Add New to add a new entry.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="my-3">
            {!! $commodities->links() !!}
        </div>
    </div>
</x-app-layout>

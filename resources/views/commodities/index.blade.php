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

        <div class="my-3 flex flex-nowrap flex-row items-center">
            <div class="flex-1 items-center">
                <a href="{{ route('commodities.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
            </div>
            <div class="flex">
                <form class="flex-nowrap" action="{{ route('commodities.index') }}" method="GET">
                    <x-forms.input
                        value="{{ old('search', request()->query('search')) }}"
                        name="search"
                        placeholder="Search...">
                    </x-forms.input>
                </form>
            </div>
        </div>

        <table class="table-fixed min-w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">No.</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Roadmaps</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($commodities as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->office ? $item->office->name : '' }}</td>
                        <td class="px-6 py-3 text-sm text-center">
                            @foreach($item->roadmaps as $roadmap)
                                <a class="text-blue-500 hover:text-blue-900" href="{{ route('roadmaps.show', $roadmap->id) }}">{{ $roadmap->commodity->name ?? '' }}</a> <br/>
                            @endforeach
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm text-center">
                            <a href="{{ route('commodities.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                            <form class="inline" action="{{ route('commodities.destroy', $item->id) }}" method="POST">
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
            {!! $commodities->links() !!}
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offices') }}
        </h2>
    </x-slot>

    <div>
        <div class="my-3 flex flex-nowrap flex-row items-center">
            <div class="flex-1 items-center">
                <a href="{{ route('offices.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
            </div>
            <div class="flex">
                <form class="flex-nowrap" action="{{ route('offices.index') }}" method="GET">
                    <x-forms.input
                        value="{{ old('search', request()->query('search')) }}"
                        name="search"
                        placeholder="Search...">
                    </x-forms.input>
                </form>
            </div>
        </div>
        <table class="min-w-full table-fixed">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Short Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Roadmaps</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($offices as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->name }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->short_name }}</td>
                        <td class="px-6 py-3 text-sm text-center">
                            @foreach($item->roadmaps as $roadmap)
                                <a class="text-blue-500 hover:text-blue-900" href="{{ route('roadmaps.show', $roadmap->id) }}">{{ $roadmap->commodity->name ?? '' }}</a> <br/>
                            @endforeach
                        </td>
                        <td class="px-6 py-3 text-sm text-center">
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('offices.edit', $item->id) }}">Edit</a> |
                            <form class="inline" action="{{ route('offices.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2">
            {{ $offices->links() }}
        </div>
    </div>
</x-app-layout>

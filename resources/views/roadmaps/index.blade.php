<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roadmaps') }}
        </h2>
    </x-slot>

    <div>
        <div class="my-3">
            <a href="{{ route('roadmaps.create') }}" class="text-blue-500 hover:text-blue-900">Add New</a>
        </div>
        <table class="table-fixed min-w-full divide-y">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Office</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Commodity</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Date Formulation/Updating Started</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-gray-50">
                @foreach($roadmaps as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->office->name ?? '' }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->commodity->name ?? '' }}</td>
                        <td class="px-6 py-3 text-sm text-center">{{ $item->start_date }}</td>
                        <td class="px-6 py-3 text-sm text-center">
                            <a class="text-green-500 hover:text-green-900" href="{{ route('roadmaps.show', $item->id) }}">View</a> |
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('roadmaps.edit', $item->id) }}">Edit</a> |
                            <form class="inline" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">
            {{ $roadmaps->links() }}
        </div>
    </div>
</x-app-layout>

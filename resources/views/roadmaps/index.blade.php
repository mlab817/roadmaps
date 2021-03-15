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
        <table class="table-fixed min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 w-20 tracking-wide">ID</th>
                    <th class="px-4 py-2 tracking-wide">Office</th>
                    <th class="px-4 py-2 tracking-wide">Commodity</th>
                    <th class="px-4 py-2 tracking-wide">Date Formulation/Updating Started</th>
                    <th class="px-4 py-2 tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-gray-50">
                @foreach($roadmaps as $item)
                    <tr>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->id }}</td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->office->name ?? '' }}</td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->commodity->name ?? '' }}</td>
                        <td class="px-4 py-2 text-sm text-center">{{ $item->start_date }}</td>
                        <td class="px-4 py-2 text-sm text-center">
                            <a class="text-blue-500" href="{{ route('roadmaps.edit', $item->id) }}">Edit</a> |
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

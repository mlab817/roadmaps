<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Users"></x-page-title>
    </x-slot>

    <div>

        <table class="table-fixed min-w-full divide-y">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">ID</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-gray-50">
            @foreach($users as $item)
                <tr>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->id }}</td>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->name ?? '' }}</td>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->email }}</td>
                    <td class="px-6 py-3 text-sm text-center">{{ $item->roles->pluck('name')->join(', ') ?? '' }}</td>
                    <td class="px-6 py-3 text-sm text-center">
                        <a class="text-blue-500 hover:text-blue-900" href="{{ route('users.edit', $item->id) }}">Manage Roles</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-3">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>

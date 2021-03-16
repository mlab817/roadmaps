<x-app-layout>
    <x-slot name="header">
        <x-page-title title="{{ __('Roadmap Information') }}"></x-page-title>
    </x-slot>

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>

                    <p class="mt-1 text-sm text-gray-600">

                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                Commodity
                            </label>
                            <p>{{ $roadmap->commodity->name }}</p>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Office
                            </label>
                            <p>{{ $roadmap->office->name }}</p>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Date Formulation/Updating Started
                            </label>
                            <p>{{ $roadmap->start_date }}</p>
                        </div>
                    </div>
                </div>
                @admin
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <a href="{{ route('roadmaps.edit', $roadmap->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                        Edit
                    </a>
                </div>
                @endadmin
            </div>
        </div>

        <x-divider></x-divider>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Focal Persons</h3>

                    <p class="mt-1 text-sm text-gray-600">

                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <x-tables.th>Name</x-tables.th>
                                <x-tables.th>Email</x-tables.th>
                                <x-tables.th>Contact Info</x-tables.th>
                                <x-tables.th></x-tables.th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-gray-500">
                            @forelse($roadmap->focals as $item)
                                <tr>
                                    <td class="px-6 py-3 text-sm text-center">
                                        <span class="font-weight-bold tracking-wide text-uppercase">
                                            {{ $item->name }}
                                        </span>
                                        <p class="text-sm text-gray-500">
                                            {{ $item->designation }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-3 text-sm text-center flex flex-wrap break-words">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-center">
                                        {{ $item->viber_number }}
                                    </td>
                                    @admin
                                    <td class="px-6 py-3 text-sm text-center">
                                        <a class="text-blue-500 hover:text-blue-900" href="{{ route('focals.edit', $item->id) }}">Edit</a> |
                                        <form class="inline" action="{{ route('focals.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:text-red-900" type="Submit">Delete</button>
                                        </form>
                                    </td>
                                    @endadmin
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-3 text-sm text-center">No items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @admin
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <a href="{{ route('focals.create',['roadmap_id' => $roadmap->id, 'office_id' => $roadmap->office_id]) }}" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                        Add
                    </a>
                </div>
                @endadmin
            </div>
        </div>

        <x-divider></x-divider>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Roadmap Updates</h3>

                    <p class="mt-1 text-sm text-gray-600">

                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <x-tables.th>Report Period</x-tables.th>
                                <x-tables.th>Participants Involved</x-tables.th>
                                <x-tables.th>Activities Done</x-tables.th>
                                <x-tables.th>Activities Ongoing</x-tables.th>
                                <x-tables.th>Overall Status</x-tables.th>
                                <x-tables.th>Attachment</x-tables.th>
                                <x-tables.th></x-tables.th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-gray-500">
                        @forelse($roadmap->roadmap_updates as $item)
                            <tr>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    {{ $item->progress_report->report_period->name ?? '' }}
                                </td>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    {{ $item->participants_involved }}
                                </td>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    {{ $item->activities_done }}
                                </td>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    {{ $item->activities_ongoing }}
                                </td>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    {{ $item->overall_status }}
                                </td>
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    <a class="text-blue-500 hover:text-blue-900" href="{{ $item->attachment_url }}" target="_blank">View</a>
                                </td>
                                @admin
                                <td class="px-6 py-3 text-sm text-center items-start">
                                    <a href="{{ route('roadmap-updates.edit', ['roadmap_update' => $item->id]) }}" class="text-blue-500 text-blue-900">Edit</a> |
                                    <form class="inline inline-flex" action="{{ route('roadmap-updates.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                                @endadmin
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-3 text-sm text-center">No items found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @admin
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <a href="{{ route('roadmap-updates.create', ['roadmap_id' => $roadmap->id] ) }}" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                        Add
                    </a>
                </div>
                @endadmin
            </div>
        </div>
    </div>
</x-app-layout>

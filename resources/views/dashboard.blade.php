<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">ROADMAP UPDATING MONITORING SYSTEM</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Roadmap development is paramount.
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        The government, through the Department of Agriculture, should take the lead in generating the “big ideas” for the roadmap, and should solicit inputs from the private sector and other stakeholders.
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        The roadmap should also actively involve the private sector, which may have more access to the export markets and funding for research for development.
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        A value-chain approach to level up Philippine agriculture, while making sure the smallholders also earn their fair share of the fruits of production along the value chain.
                    </p>
                </div>

                <div class="mt-10">
                    <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <!-- Heroicon name: outline/globe-alt -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Directory</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Easily access the assigned focal persons per office and commodity roadmap <a class="text-blue-500 hover:text-hover-900" href="{{ route('focals.index') }}">here</a>.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Monitor Progress</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Monitor progress of roadmap updating through the submission of progress reports <a class="text-blue-500 hover:text-hover-900" href="{{ route('progress-reports.index') }}">here</a>. Progress reports
                                have been uploaded for easy access.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <!-- Heroicon name: outline/lightning-bolt -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Manage Updates</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                View and manage updates per commodity roadmap <a class="text-blue-500 hover:text-hover-900" href="{{ route('roadmaps.index') }}">here</a>. Different
                                available versions of the roadmap are also uploaded every time they are submitted.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <!-- Heroicon name: outline/annotation -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Manage Reviews</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                For construction.
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="py-3 text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">
                SUMMARY
            </h2>
            <a href="{{ route('dashboard.preview') }}" class="text-xs text-blue-500 hover:text-blue-900">Export Table</a>
        </div>
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <x-tables.th>Office/Roadmap</x-tables.th>
                <x-tables.th>Date Started</x-tables.th>
                <x-tables.th>Participants Involved</x-tables.th>
                <x-tables.th>Activities Done</x-tables.th>
                <x-tables.th>Ongoing Activities</x-tables.th>
                <x-tables.th>Overall Status</x-tables.th>
                <x-tables.th>As of</x-tables.th>
                <x-tables.th>Attachment</x-tables.th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse($offices as $office)
                <tr>
                    <td class="items-start px-3 py-3 text-xs">{{ $office->name }}</td>
                    <td class="items-start px-9 py-3 text-xs" colspan="5"></td>
                    <td class="items-start px-3 py-3 text-xs text-center">{{ $office->latest_report->report_period->name ?? '' }}</td>
                    <td class="items-start px-3 py-3 text-xs text-center">
                        @if($office->latest_report && $office->latest_report->attachment_url)
                            <a href="{{ $office->latest_report->attachment_url ?? '#' }}" target="_blank">
                                <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    </td>
                </tr>
                @forelse($office->roadmaps as $rm)
                    <tr>
                        <td class="px-6 py-3 text-xs align-top">
                            {{ $rm->commodity->name ?? '' }}
                        </td>
                        <td class="px-6 py-3 text-xs align-top">
                            {{ $rm->start_date }}
                        </td>
                        <td class="px-3 py-3 text-xs align-top">
                            {!! nl2br($rm->latest_update->participants_involved ?? '') !!}
                        </td>
                        <td class="px-3 py-3 text-xs align-top">
                            {!! nl2br($rm->latest_update->activities_done ?? '')  !!}
                        </td>
                        <td class="px-3 py-3 text-xs align-top">
                            {!! nl2br($rm->latest_update->activities_ongoing ?? '') !!}
                        </td>
                        <td class="px-3 py-3 text-xs align-top">
                            {!! nl2br($rm->latest_update->overall_status ?? '') !!}
                        </td>
                        <td class="items-start py-3 text-xs text-center align-top">
                            {{ $rm->latest_update && $rm->latest_update->report_date ? \Carbon\Carbon::make($rm->latest_update->report_date)->format('M d, Y') : '' }}
                        </td>
                        <td class="items-start py-3 text-xs text-center align-top">
                            <span class="inline-block items-start">
                                @if($rm->latest_update && $rm->latest_update->attachment_url)
                                    <a href="{{ $rm->latest_update->attachment_url }}" target="_blank">
                                        <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-3 text-xs text-center text-red-500" colspan="8">No roadmaps found</td>
                    </tr>
                @endforelse
            @empty
                <tr>
                    <td class="px-6 py-3 text-xs text-center text-red-500" colspan="8">No offices found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

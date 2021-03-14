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
        {{ $roadmaps->links() }}
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Assign Roles{{ ': ' . $user->name }}"></x-page-title>
    </x-slot>

    <div>
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4 space-y-1">
                @foreach($roles as $item)
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="roles"
                                value="{{ $item->id }}"
                                name="roles[]"
                                type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                            @if(in_array($item->id, $user->roles->pluck('id')->toArray())) {{ 'checked' }} @endif>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="$item->name" class="font-medium text-gray-700">{{ $item->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('roles')
            <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
            <div class="mt-3">
                <button class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-center h-full py-2 px-4 text-white sm:text-sm rounded-md" type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>

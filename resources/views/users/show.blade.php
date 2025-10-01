<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-full h-20 w-20 object-cover">
                        @else
                            <img src="{{ asset('asset-management-system/dist/img/avatar.jpg') }}" alt="Default Profile Picture" class="rounded-full h-20 w-20 object-cover">
                        @endif
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                            <div class="text-sm text-gray-500">{{ $user->role }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-filament::widget>
    <x-filament::card class="bg-gray-50 p-6 shadow-md rounded-lg">
        <div class="space-y-4">
            {{-- Header --}}
            <div class="flex items-center space-x-3">
                {{-- image  --}}
                @if ($user->profile)
                    <img src="{{ Storage::url($user->profile) }}" alt="Logo"
                        class="h-12 w-12 rounded-full object-cover">
                @else
                    <div
                        class="h-12 w-12 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
                <h2 class="text-lg font-semibold text-gray-700">
                    User Details
                </h2>
            </div>

            {{-- Information Rows --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                {{-- Username --}}
                <div class="flex items-center">
                    <x-heroicon-o-user class="h-5 w-5 text-blue-500 mr-2" />
                    <p class="text-sm font-bold text-gray-600">Username:</p>
                    <p class="ml-2 text-sm text-gray-800">{{ $user->name }}</p>
                </div>

                {{-- Email --}}
                <div class="flex items-center">
                    <x-heroicon-o-mail class="h-5 w-5 text-blue-500 mr-2" />
                    <p class="text-sm font-bold text-gray-600">Email:</p>
                    <p class="ml-2 text-sm text-gray-800">{{ $user->email }}</p>
                </div>

                {{-- Role --}}
                <div class="flex items-center">
                    <x-heroicon-o-identification class="h-5 w-5 text-green-500 mr-2" />
                    <p class="text-sm font-bold text-gray-600">Role:</p>
                    <p class="ml-2 text-sm text-gray-800">
                        {{ $user->getRoleNames()->first() ?? 'N/A' }}
                    </p>
                </div>

                {{-- Permissions --}}
                <div class="flex items-center">
                    <x-heroicon-o-shield-check class="h-5 w-5 text-purple-500 mr-2" />
                    <p class="text-sm font-bold text-gray-600">Permissions:</p>
                    <p class="ml-2 text-sm text-gray-800">
                        {{ $user->permissions->pluck('name')->join(', ') ?: 'None' }}
                    </p>
                </div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>

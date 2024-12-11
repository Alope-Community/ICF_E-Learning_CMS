<x-filament::widget>
    <x-filament::card>
        <div class="space-y-6">
            <!-- Course Category -->
            <div class="flex items-center space-x-4">
                <div class="text-sm font-medium text-gray-600 uppercase">
                    Category:
                </div>
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('filament.resources.categories.view', ['record' => $course->category->id]) }}">
                        <div class="font-medium bg-indigo-500 text-white py-1 px-3 rounded-full">
                            {{ $course->category->title }}
                        </div>
                    </a>
                @else
                    <div class="font-medium bg-indigo-500 text-white py-1 px-3 rounded-full">
                        {{ $course->category->title }}
                    </div>
                @endif
            </div>

            <!-- Course Description -->
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $course->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $course->description }}</p>
            </div>

            <!-- Course Content -->
            <div class="prose max-w-none">
                {!! $course->body !!}
            </div>

            <!-- Users Enrolled -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Users Enrolled:</h3>
                @if ($course->users->isEmpty())
                    <p class="mt-2 text-gray-500">No users enrolled in this course.</p>
                @else
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($course->users as $user)
                            <div
                                class="flex items-center space-x-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex-shrink-0">
                                    <div
                                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-indigo-600 font-bold">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-800">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>

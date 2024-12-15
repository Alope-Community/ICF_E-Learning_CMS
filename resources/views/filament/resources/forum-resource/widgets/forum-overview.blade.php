<x-filament::widget>
    <x-filament::card>
        <div class="space-y-8 pb-7"> 
            
            <!-- Forum Title -->
            <div class="text-2xl font-semibold text-gray-800">
                {{ $forum->title }}
            </div>

            <!-- Course Name Section -->
            <div class="">
                @if (auth()->user()->hasRole('admin') ||
                        (auth()->user()->hasRole('teacher') && auth()->user()->id === $forum->course->user->id))
                    <a href="{{ route('filament.resources.courses.view', ['record' => $forum->course->id]) }}">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold mr-2">Course:</span>
                            <span
                                class="rounded-full px-4 py-2 bg-indigo-500 text-white">{{ $forum->course->title }}</span>
                        </div>
                    </a>
                @else
                    <div class="text-sm text-gray-600">
                        <span class="font-semibold mr-2">Course:</span>
                        <span class="rounded-full px-4 py-2 bg-indigo-500 text-white">{{ $forum->course->title }}</span>
                    </div>
                @endif
            </div>

            {{-- <div class="">
                <a href="{{ route('filament.resources.discussions.view', ['record' => $forum->course->id]) }}" class="inline-flex gap-1 items-center text-blue-700 hover:text-blue-500 hover:underline hover:underline-offset-2 font-medium cursor-pointer">
                    Go To Discussion
                    <x-heroicon-o-arrow-right class="w-5 h-5" />
                </a>
            </div> --}}

        </div>
    </x-filament::card>
</x-filament::widget>

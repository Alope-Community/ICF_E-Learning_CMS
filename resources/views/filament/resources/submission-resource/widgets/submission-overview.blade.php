<x-filament::widget>
    <x-filament::card>
        <div class="flex flex-col gap-5">
            <div class="flex items-center space-x-4">
                <div class="text-sm font-medium text-gray-600 uppercase">
                    From Course:
                </div>
                <a href="{{ route('filament.resources.courses.view', ['record' => $submission->course->id]) }}">
                    <div class="font-semibold bg-indigo-500 text-white px-3 py-1 rounded-full">
                        {{ $submission->course->title }}
                    </div>
                </a>
            </div>
            <div class="">
                <p class="text-lg font-bold">Deskripsi Submission:</p>
                <p>{{ $submission->description }}</p>
            </div>
            <div class="">
                <p class="text-lg font-bold">Deadline Tugas:</p>
                <p>{{ \Carbon\Carbon::parse($submission->deadline)->translatedFormat('l, d F Y - H:i') ?? '-' }}</p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>

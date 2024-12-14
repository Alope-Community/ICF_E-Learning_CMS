<x-filament::widget>
    <x-filament::card>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Submitted By:</p>
            <p class="">{{ $submitSubmission->user->name }}</p>
        </div>
        <div class="gap-2">
            <p class="font-bold text-gray-700 mb-2">Attachments:</p>
            @if ($submitSubmission->file !== null)
                <a class="inline-flex gap-1 items-center text-blue-700 hover:text-blue-500 hover:underline hover:underline-offset-2 font-medium"
                    href="{{ Storage::url($submitSubmission->file) }}">
                    Download File <x-heroicon-o-download class="size-[19px]" />
                </a>
            @else
                <p>-</p>
            @endif
        </div>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Body:</p>
            <p class="">{{ $submitSubmission->body }}</p>
        </div>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Grade:</p>
            <p class="">{{ $submitSubmission->grade ?? '-' }}</p>
        </div>
    </x-filament::card>
</x-filament::widget>

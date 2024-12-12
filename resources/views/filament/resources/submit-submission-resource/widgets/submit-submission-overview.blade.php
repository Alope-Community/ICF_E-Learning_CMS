<x-filament::widget>
    <x-filament::card>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Assigned By:</p>
            <p class="">{{ $submitSubmission->user->name }}</p>
        </div>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Attachments:</p>
            <p class="">{{ $submitSubmission->file }}</p>
        </div>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-gray-700">Body:</p>
            <p class="">{{ $submitSubmission->body }}</p>
        </div>
    </x-filament::card>
</x-filament::widget>

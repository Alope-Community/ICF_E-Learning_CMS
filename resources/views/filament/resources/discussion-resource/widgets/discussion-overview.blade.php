<x-filament::widget>
    <x-filament::card>
        <!-- Header -->
        <div class="mb-6 border-b pb-4 space-y-5">
            <h2 class="text-xl font-bold text-gray-800"><span class="font-semibold text-base text-gray-600">Topic: </span>{{ $discussion->forum->title }}</h2>
            <p class="text-sm text-gray-600">From: {{ $discussion->user->name }}</p>
        </div>

        <!-- Discussion -->
        <div class="mb-6">
            <p class="font-medium text-sm text-gray-600">Message:</p>
            <div class="my-6">
                {!! $discussion->message !!}
            </div>
        </div>

    </x-filament::card>
</x-filament::widget>

<x-filament::widget>
    @if ($this->renderData())
        <x-filament::card>
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center">
                    <h3 class="text-xl font-bold">{{ $this->renderData()['users']['teacher'] }}</h3>
                    <p class="text-sm text-gray-500">Teachers</p>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold">{{ $this->renderData()['users']['student'] }}</h3>
                    <p class="text-sm text-gray-500">Students</p>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold">{{ $this->renderData()['courses']['total'] }}</h3>
                    <p class="text-sm text-gray-500">Courses</p>
                </div>
            </div>
        </x-filament::card>
    @endif
</x-filament::widget>

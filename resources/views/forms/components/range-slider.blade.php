<x-dynamic-component :component="$getFieldWrapperView()" :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()"
    :hint="$getHint()" :hint-action="$getHintAction()" :hint-color="$getHintColor()" :hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }" class="space-y-2">
        <input type="range" x-model="state" id="{{ $getId() }}" min="{{ $getMin() }}" max="{{ $getMax() }}"
            step="{{ $getStep() }}" {{ $isDisabled() ? 'disabled' : '' }}
            class="w-full h-2 bg-primary-500 rounded-full focus:outline-none">
        <div class="text-sm text-gray-500">
            Grade: <span x-text="state"></span>
        </div>
    </div>
</x-dynamic-component>

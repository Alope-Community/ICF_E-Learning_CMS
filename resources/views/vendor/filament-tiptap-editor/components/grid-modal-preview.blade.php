@php
    $data = $getLivewire()->mountedFormComponentActionData;
@endphp

<div class="rounded-lg p-4 bg-gray-100">
    <div class="grid gap-4" style="grid-template-columns: repeat({{ $data['columns'] }}, minmax(0, 1fr))">
        @if ($data['asymmetric'])
            <div
                class="bg-gray-300 rounded-lg border border-dashed border-white p-0.5 text-center"
                style="grid-column: span {{ $data['asymmetric_left'] }};"
            >
                <p>1</p>
            </div>
            <div
                class="bg-gray-300 rounded-lg border border-dashed border-white p-0.5 text-center"
                style="grid-column: span {{ $data['asymmetric_right'] }};"
            >
                <p>1</p>
            </div>
        @else
            @foreach(range(1, $data['columns']) as $column)
                <div class="bg-gray-300 rounded-lg border border-dashed border-white p-0.5 text-center">
                    <p>{{ $column }}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>

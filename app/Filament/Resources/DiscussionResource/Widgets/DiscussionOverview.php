<?php

namespace App\Filament\Resources\DiscussionResource\Widgets;

use App\Models\Discussion;
use Filament\Widgets\Widget;

class DiscussionOverview extends Widget
{
    protected static string $view = 'filament.resources.discussion-resource.widgets.discussion-overview';

    public $discussion;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->discussion = Discussion::with(['forum', 'user'])->findOrFail($id);
    }
}

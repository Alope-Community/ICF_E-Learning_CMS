<?php

namespace App\Filament\Resources\ForumResource\Widgets;

use App\Models\Forum;
use Filament\Widgets\Widget;

class ForumOverview extends Widget
{
    protected static string $view = 'filament.resources.forum-resource.widgets.forum-overview';

    public $forum;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->forum = Forum::findOrFail($id);
    }
}

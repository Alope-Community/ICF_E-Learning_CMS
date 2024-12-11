<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\Widget;

class CategoryOverview extends Widget
{
    protected static string $view = 'filament.resources.category-resource.widgets.category-overview';

    public $category;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->category = Category::findOrFail($id);
    }
}

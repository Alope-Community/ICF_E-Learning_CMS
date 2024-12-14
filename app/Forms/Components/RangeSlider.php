<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class RangeSlider extends Field
{
    protected string $view = 'forms.components.range-slider';

    protected int|float|null $min = null;

    protected int|float|null $max = null;

    protected int|float|null $step = null;

    public function min(int|float $value): static
    {
        $this->min = $value;

        return $this;
    }

    public function max(int|float $value): static
    {
        $this->max = $value;

        return $this;
    }

    public function step(int|float $value): static
    {
        $this->step = $value;

        return $this;
    }

    public function getMin(): int|float|null
    {
        return $this->min;
    }

    public function getMax(): int|float|null
    {
        return $this->max;
    }

    public function getStep(): int|float|null
    {
        return $this->step;
    }
}

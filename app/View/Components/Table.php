<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    public $collection;
    public $headers;
    public $footers;
    public $colspan;

    public function __construct(Collection|null $collection, $headers = [], $footers = [], $colspan = 1)
    {
        $this->collection = $collection;
        $this->headers = $headers;
        $this->footers = $footers;
        $this->colspan = $colspan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.view');
    }
}

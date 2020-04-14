<?php

namespace Anggagewor\Purdia\View\Components\Base\Table;

use Illuminate\View\Component;

class Table extends Component
{
    public $class;
    public function __construct($class = null)
    {
        $this->class = $class ?? 'table';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('purdia::components.base.table.table');
    }
}

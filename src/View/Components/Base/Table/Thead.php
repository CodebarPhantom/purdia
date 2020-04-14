<?php

namespace Anggagewor\Purdia\View\Components\Base\Table;

use Illuminate\View\Component;

class Thead extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('purdia::components.base.table.thead');
    }
}

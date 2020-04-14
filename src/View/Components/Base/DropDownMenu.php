<?php

namespace Anggagewor\Purdia\View\Components\Base;

use Illuminate\View\Component;

class DropDownMenu extends Component
{
    public $class;
    public $icon;
    public $label;
    public function __construct($class = null, $icon = null, $label = null)
    {
        $this->class = $class;
        $this->icon = $icon;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('purdia::components.base.drop-down-menu');
    }
}

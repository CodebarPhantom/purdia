<?php

namespace Anggagewor\Purdia\View\Components\Base;

use Illuminate\View\Component;

class DropDownItem extends Component
{
    public $url;
    public $icon;
    public $label;
    public function __construct($url = null, $icon = null, $label = null)
    {
        $this->url = $url;
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
        return view('purdia::components.base.drop-down-item');
    }
}

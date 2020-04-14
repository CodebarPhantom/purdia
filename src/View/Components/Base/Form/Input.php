<?php

namespace Anggagewor\Purdia\View\Components\Base\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $value;
    public $type;
    public $label;
    public function __construct($name = null, $value = null, $type = null, $label = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('purdia::components.base.form.input');
    }
}

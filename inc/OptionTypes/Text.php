<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

class Text extends OptionAbstract
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'text';
    }
}

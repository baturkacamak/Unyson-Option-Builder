<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

class TextArea extends OptionAbstract
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'textarea';
    }
}

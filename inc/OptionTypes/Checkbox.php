<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

class Checkbox extends OptionAbstract
{
    protected string $text = '';
    /**
     * @param string $text
     *
     * @return Checkbox
     */
    public function setText(string $text): Checkbox
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'checkbox';
    }
}

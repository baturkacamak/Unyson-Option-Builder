<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class ColorPicker extends OptionAbstract
{
    /**
     * array( '#ba4e4e', '#0ce9ed', '#941940' )
     *
     * @var array
     */
    protected array $palettes;

    /**
     * @param array $palettes
     *
     * @return ColorPicker
     */
    public function withPalettes(array $palettes): ColorPicker
    {
        $this->palettes = $palettes;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'color-picker';
    }
}

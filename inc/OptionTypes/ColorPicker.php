<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `ColorPicker` option type for a configuration framework.
 * It allows users to choose a color from a predefined palette of colors.
 */
class ColorPicker extends OptionAbstract
{
    /**
     * An array of hexadecimal color codes representing the available color options for the `ColorPicker` instance.
     *
     * @var array
     */
    protected array $palettes;

    /**
     * Sets the available color options for the `ColorPicker` instance.
     *
     * @param array $palettes An array of hexadecimal color codes
     *
     * @return ColorPicker The `ColorPicker` instance with the updated color options
     */
    public function withPalettes(array $palettes): ColorPicker
    {
        $this->palettes = $palettes;

        return $this;
    }

    /**
     * Gets the type identifier for the `ColorPicker` option type.
     *
     * @return string The type identifier for the `ColorPicker` option type
     */
    public function getType(): string
    {
        return 'color-picker';
    }
}

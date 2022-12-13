<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `Radio` option type for a configuration framework.
 * It allows users to choose one option from a list of predefined choices.
 */
class Radio extends OptionAbstract
{
    /**
     * An array of strings representing the available choices for the `Radio` instance.
     *
     * @var array
     */
    protected array $choices = [];

    /**
     * A boolean value indicating whether the radio buttons should be displayed inline or stacked vertically.
     *
     * @var bool
     */
    protected bool $inline = false;

    /**
     * An array of required properties for the `Radio` option type, which are used by the `hasRequiredFields()` method to
     * check whether the option has all of the required properties before it is converted to an option array.
     *
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * Sets the display mode for the radio buttons.
     *
     * @param bool $inline A boolean value indicating whether the radio buttons should be displayed inline or stacked vertically.
     *
     * @return Radio The `Radio` instance with the updated display mode.
     */
    public function withInline(bool $inline): Radio
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * Sets the available choices for the `Radio` instance.
     *
     * @param array $choices An array of strings representing the available choices for the `Radio` instance.
     *
     * @return Radio The `Radio` instance with the updated choices.
     */
    public function withChoices(array $choices): Radio
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'radio';
    }
}




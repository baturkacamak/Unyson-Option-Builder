<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `Select` option type for a configuration framework.
 * It allows users to choose a value from a predefined list of options.
 */
class Select extends OptionAbstract
{
    /**
     * A boolean flag indicating whether the selected value should be validated
     * before being set as the option value.
     *
     * @var bool
     */
    protected bool $noValidate = false;

    /**
     * An array of available options for the `Select` instance.
     *
     * @var array
     */
    protected array $choices = [];

    /**
     * A boolean flag indicating whether the select options should be displayed inline.
     *
     * @var bool
     */
    protected bool $inline = false;

    /**
     * An array containing the names of the required properties for the `Select` option type.
     *
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * Sets whether the selected value should be validated before being set as the option value.
     *
     * @param bool $noValidate A boolean flag indicating whether the selected value should be validated.
     *
     * @return Select The `Select` instance with the updated value validation flag.
     */
    public function withNoValidate(bool $noValidate): Select
    {
        $this->noValidate = $noValidate;

        return $this;
    }

    /**
     * @param bool $inline
     *
     * @return Select
     */
    public function withInline(bool $inline): Select
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return Select
     */
    public function withChoices(array $choices): Select
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'select';
    }
}



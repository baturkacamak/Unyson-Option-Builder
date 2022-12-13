<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `SwitchOption` option type for a configuration framework.
 * It allows users to choose between two predefined options, represented by the
 * `$leftChoice` and `$rightChoice` arrays.
 */
class SwitchOption extends OptionAbstract
{
    /**
     * An array containing the data for the left choice of the `SwitchOption` instance.
     *
     * @var array
     */
    protected array $leftChoice;

    /**
     * An array containing the data for the right choice of the `SwitchOption` instance.
     *
     * @var array
     */
    protected array $rightChoice;

    /**
     * Sets the left choice for the `SwitchOption` instance.
     *
     * @param array $leftChoice The data for the left choice.
     *
     * @return SwitchOption The `SwitchOption` instance with the updated left choice.
     */
    public function withLeftChoice(array $leftChoice): SwitchOption
    {
        $this->leftChoice = $leftChoice;

        return $this;
    }

    /**
     * Sets the right choice for the `SwitchOption` instance.
     *
     * @param array $rightChoice The data for the right choice.
     *
     * @return SwitchOption The `SwitchOption` instance with the updated right choice.
     */
    public function withRightChoice(array $rightChoice): SwitchOption
    {
        $this->rightChoice = $rightChoice;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'switch';
    }
}



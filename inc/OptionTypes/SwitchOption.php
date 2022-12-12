<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class SwitchOption extends OptionAbstract
{
    /**
     * @var array
     */
    protected array $leftChoice;

    /**
     * @var array
     */
    protected array $rightChoice;

    /**
     * @param array $leftChoice
     *
     * @return SwitchOption
     */
    public function withLeftChoice(array $leftChoice): SwitchOption
    {
        $this->leftChoice = $leftChoice;

        return $this;
    }

    /**
     * @param array $rightChoice
     *
     * @return SwitchOption
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

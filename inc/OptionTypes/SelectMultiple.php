<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class SelectMultiple extends OptionAbstract
{
    /**
     * @var array
     */
    protected array $choices = [];

    /**
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * @param array $choices
     *
     * @return SelectMultiple
     */
    public function withChoices(array $choices): SelectMultiple
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'select-multiple';
    }
}

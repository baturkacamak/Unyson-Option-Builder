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
    public function setChoices(array $choices): SelectMultiple
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

    /**
     * This method will control the value is properly set
     * Example value array(
     * 'choice-1' => false,
     * 'choice-2' => true,
     * )
     *
     * @param $value
     *
     * @return bool
     */
    private function isValueValid($value): bool
    {
        return 0 === count(
                array_filter($value, function ($array_value, $array_key) {
                    return !is_bool($array_value) || !is_string($array_key);
                }, ARRAY_FILTER_USE_BOTH)
            );
    }
}

<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class Select extends OptionAbstract
{
    /**
     * @var bool
     */
    protected bool $noValidate = false;

    /**
     * @var array
     */
    protected array $choices = [];

    /**
     * @var bool
     */
    protected bool $inline = false;

    /**
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * @param bool $noValidate
     *
     * @return Select
     */
    public function setNoValidate(bool $noValidate): Select
    {
        $this->noValidate = $noValidate;

        return $this;
    }

    /**
     * @param bool $inline
     *
     * @return Select
     */
    public function setInline(bool $inline): Select
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return Select
     */
    public function setChoices(array $choices): Select
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

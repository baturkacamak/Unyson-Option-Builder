<?php

namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class Checkboxes extends OptionAbstract
{
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
     * @param bool $inline
     *
     * @return Checkboxes
     */
    public function setInline(bool $inline): Checkboxes
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return OptionAbstract
     */
    public function setChoices(array $choices): Checkboxes
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @param array $value
     *
     * @throws Exception
     *
     * @return OptionAbstract
     */
    public function withValue($value): Checkboxes
    {
        if (!$this->isValueValid($value)) {
            throw new Exception('Incorrect value format. Example format: (string) $key => (bool) $value');
        }

        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'checkboxes';
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

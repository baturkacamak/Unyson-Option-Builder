<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class MultipleSelect extends OptionAbstract
{
    /**
     * Set population method
     * Are available: 'posts', 'taxonomy', 'users', 'array'
     *
     * @var string
     */
    protected string $population;

    /**
     * @var string
     */
    protected string $source;

    /**
     * @var int
     */
    protected int $prepopulate;

    /**
     * @var int
     */
    protected int $limit;

    /**
     * @var array
     */
    protected array $choices = [];

    /**
     * @var array|string[]
     */
    protected array $requiredProperties = ['population'];

    /**
     * @param array $choices
     *
     * @return MultipleSelect
     */
    public function withChoices(array $choices): MultipleSelect
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'multi-select';
    }
}

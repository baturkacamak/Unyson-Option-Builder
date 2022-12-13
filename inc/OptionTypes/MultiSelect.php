<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `MultipleSelect` option type for a configuration framework.
 * It allows users to select multiple options from a list of available choices.
 */
class MultipleSelect extends OptionAbstract
{
    /**
     * The population method for the `MultipleSelect` instance.
     * This determines how the available choices for the select list will be populated.
     * Possible values are: 'posts', 'taxonomy', 'users', 'array'.
     *
     * @var string
     */
    protected string $population;

    /**
     * The source for the `MultipleSelect` instance.
     * This determines the specific source of the available choices for the select list,
     * depending on the population method. For example, if the population method is 'taxonomy',
     * the source could be a specific taxonomy term.
     *
     * @var string
     */
    protected string $source;

    /**
     * A flag that indicates whether the `MultipleSelect` instance should be pre-populated
     * with selected choices.
     *
     * @var int
     */
    protected int $prepopulate;

    /**
     * The maximum number of choices that can be selected in the `MultipleSelect` instance.
     *
     * @var int
     */
    protected int $limit;

    /**
     * An array of available choices for the `MultipleSelect` instance.
     *
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

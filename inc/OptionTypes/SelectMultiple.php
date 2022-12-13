<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `SelectMultiple` option type for a configuration framework.
 * It allows users to select multiple options from a list of choices.
 */
class SelectMultiple extends OptionAbstract
{
    /**
     * An array of strings representing the available choices for the `SelectMultiple` instance.
     *
     * @var array
     */
    protected array $choices = [];

    /**
     * An array of strings representing the required properties for the `SelectMultiple` option type.
     * These properties are used by the `hasRequiredFields()` method to check whether the option has
     * all of the required properties before it is converted to an option array.
     *
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * Sets the available choices for the `SelectMultiple` instance.
     *
     * @param array $choices An array of strings representing the available choices.
     *
     * @return SelectMultiple The `SelectMultiple` instance with the updated list of choices.
     */
    public function withChoices(array $choices): SelectMultiple
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Gets the type identifier for the `SelectMultiple` option type.
     *
     * @return string The type identifier for the `SelectMultiple` option type.
     */
    public function getType(): string
    {
        return 'select-multiple';
    }
}

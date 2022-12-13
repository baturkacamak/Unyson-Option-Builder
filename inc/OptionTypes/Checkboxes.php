<?php

namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;
use UnysonOptionsBuilder\Core\ValidatedOption;

/**
* The Checkboxes class is a concrete implementation of the Option interface
* for checkbox group options. It provides methods for setting and retrieving
* the choices, value, and type of a checkbox group option.
*/
class Checkboxes extends OptionAbstract
{
    /**
     * The $validator property is an instance of the ValidatedOption class,
     * which will be used to validate the value of the checkbox group option.
     *
     * @var ValidatedOption
     */
    protected ValidatedOption $validator;

    /**
     * The $choices property is an array that will store the choices of the
     * checkbox group option, which will be displayed to users as a list of
     * checkboxes.
     *
     * @var array
     */
    protected array $choices = [];

    /**
     * The $inline property is a boolean flag that indicates whether the
     * checkboxes in the checkbox group should be displayed inline or not.
     *
     * @var bool
     */
    protected bool $inline = false;

    /**
     * The $requiredProperties property is an array of strings that specifies
     * the names of the required properties of the checkbox group option.
     * These properties will be checked by the `hasRequiredFields()` method
     * to ensure that the checkbox group option has all of the required
     * properties before it is converted to an option array.
     *
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    /**
     * The __construct() method initializes the checkbox group option object
     * by initializing the `$validator` property with a new instance of the
     * `ValidatedOption` class.
     */
    public function __construct()
    {
        $this->validator = new ValidatedOption();
    }

    /**
     * The withInline() method sets the value of the $inline property, which
     * indicates whether the checkboxes in the checkbox group should be displayed
     * inline or not.
     *
     * @param bool $inline A boolean value that indicates whether the checkboxes
     *                     should be displayed inline or not.
     *
     * @return Checkboxes The current object, for method chaining.
     */
    public function withInline(bool $inline): Checkboxes
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * The withChoices() method sets the choices of the checkbox group option,
     * which will be displayed to users as a list of checkboxes.
     *
     * @param array $choices An array of choices for the checkbox group option.
     *
     * @return Checkboxes The current object, for method chaining.
     */
    public function withChoices(array $choices): Checkboxes
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * The withValue() method sets the value of * the checkbox group option and validates it using the `$validator` object.
     * If the value is not valid, an Exception is thrown.
     *
     * @param array $value The value of the checkbox group option.
     *
     * @return Checkboxes The current object, for method chaining.
     *
     * @throws Exception If the value is not valid.
     */
    public function withValue($value): Checkboxes
    {
        if (!$this->validator->isValueValid($value)) {
            throw new Exception('Incorrect value format. Example format: (string) $key => (bool) $value');
        }

        $this->value = $value;

        return $this;
    }

    /**
     * The getType() method returns the type of the checkbox group option,
     * which is "checkboxes".
     *
     * @return string The type of the checkbox group option.
     */
    public function getType(): string
    {
        return 'checkboxes';
    }
}


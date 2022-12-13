<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * The Checkbox class is a concrete implementation of the Option interface
 * for checkbox options. It provides methods for setting and retrieving
 * the label and value of a checkbox option, as well as its type.
 */
class Checkbox extends OptionAbstract
{
    /**
     * The $text property is a string that will store the text of the checkbox
     * option, which will be displayed to users next to the checkbox.
     *
     * @var string
     */
    protected string $text = '';

    /**
     * The withText() method sets the text of the checkbox option, which will
     * be displayed to users next to the checkbox.
     *
     * @param string $text The text of the checkbox option.
     *
     * @return Checkbox The current object, for method chaining.
     */
    public function withText(string $text): Checkbox
    {
        $this->text = $text;

        // Return the current object, for method chaining.
        return $this;
    }

    /**
     * The getType() method returns the string "checkbox" to indicate that
     * this is a checkbox option.
     *
     * @return string The option type.
     */
    public function getType(): string
    {
        // Return the string "checkbox".
        return 'checkbox';
    }
}
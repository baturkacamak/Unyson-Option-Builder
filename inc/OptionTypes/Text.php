<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * The Text class is used to create a text input option in the Unyson Option
 * Builder library. It extends the OptionAbstract class, which provides the
 * basic functionality for all option types.
 *
 * The Text class defines a getType() method that returns the string "text" to
 * indicate that this is a text input option. This value is used to determine
 * how the option should be rendered in the user interface.
 */
class Text extends OptionAbstract
{
    /**
     * The getType() method returns the string "text" to indicate that this is
     * a text input option.
     *
     * @return string The option type.
     */
    public function getType(): string
    {
        return 'text';
    }
}
<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 * This class defines a `TextArea` option type for a configuration framework.
 * It allows users to enter text in a multi-line text area.
 */
class TextArea extends OptionAbstract
{
    /**
     * Gets the type identifier for the `TextArea` option type.
     *
     * @return string The type identifier for the `TextArea` option type.
     */
    public function getType(): string
    {
        return 'textarea';
    }
}

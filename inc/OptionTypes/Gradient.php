<?php

namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;
use UnysonOptionsBuilder\Core\ValidatedOption;

/**
 * This class defines a `Gradient` option type for a configuration framework.
 * It allows users to choose a gradient from a predefined palette of gradients.
 */
class Gradient extends OptionAbstract
{
    /**
     * An instance of the `ValidatedOption` class, which is used to validate the
     * selected gradient before it is set as the option value.
     *
     * @var ValidatedOption
     */
    protected ValidatedOption $validator;

    /**
     * The constructor method initializes the `Gradient` instance by creating a
     * new `ValidatedOption` instance and storing it in the `$validator` property.
     */
    public function __construct()
    {
        $this->validator = new ValidatedOption();
    }

    /**
     * Sets the selected gradient for the `Gradient` instance.
     *
     * @param array $value An array representing the selected gradient.
     *
     * @return Gradient The `Gradient` instance with the updated gradient value.
     * @throws Exception If the provided value is not in the correct format.
     */
    public function withValue($value): Gradient
    {
        if (!$this->validator->isValueValid($value)) {
            throw new Exception('Incorrect value format. Example format: (string) $key => (bool) $value');
        }

        $this->value = $value;

        return $this;
    }

    /**
     * Gets the type identifier for the `Gradient` option type.
     *
     * @return string The type identifier for the `Gradient` option type.
     */
    public function getType(): string
    {
        return 'gradient';
    }
}

<?php

namespace UnysonOptionsBuilder;

use UnysonOptionsBuilder\Core\Option;

/**
 * The Builder class is responsible for managing a collection of options.
 *
 * It allows users to add options to the builder using the `addOption()` method,
 * and to retrieve the added options using the `getOptions()` method. The options
 * are returned in a structured array format that can be used in WordPress and
 * Unyson FW configuration files, or in an IDE for easier development.
 */
class Builder
{
    // The addedOptions property is an array that will store the options added to the builder
    protected array $addedOptions = [];

    /**
     * The addOption method adds a new option to the builder.
     *
     * @param Option $option The option to add to the builder
     *
     * @return $this|Builder The Builder instance, to allow method chaining
     */
    public function addOption(Option $option): static
    {
        // Add the option to the addedOptions array
        $this->addedOptions[$option->getId()] = $option;

        // Return the builder instance to allow method chaining
        return $this;
    }

    /**
     * The getOptions method retrieves the options that have been added to the builder.
     *
     * @return array An array of option arrays, in a structured format that can be
     *               used in WordPress and Unyson FW configuration files or in an IDE
     */
    public function getOptions(): array
    {
        // Initialize the convertedOptions array that will store the options
        $converted_options = [];

        // Loop through the options in the addedOptions array
        /** @var Option $option */
        foreach ($this->addedOptions as $option) {
            // Retrieve the option data as an array
            $option_array = $option->getArrayCopy();
            // Get the option's ID
            $option_id = $option_array['id'];
            // Remove the ID from the option array
            unset($option_array['id']);
            // Add the option array to the convertedOptions array, including the option type and ID
            $converted_options[] = [
                $option_id => array_merge([
                    'type' => $option->getType(),
                ], $option_array),
            ];
        }

        // Return the convertedOptions array
        return $converted_options;
    }
}

<?php

namespace UnysonOptionsBuilder\Core;
/**
 * The `Option` interface defines a common set of methods that must be implemented
 * by all options in the Unyson Options Builder.
 *
 * Options are used to create user-editable settings in WordPress and Unyson FW
 * configuration files.
 */
interface Option
{
    /**
     * The getType() method returns the type of the option, as a string.
     *
     * @return string The type of the option.
     */
    public function getType(): string;

    /**
     * The withTextDomain() method sets the text domain of the option, which is
     * used for localization of labels, descriptions, and help text.
     *
     * @param string $textDomain The text domain of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withTextDomain(string $textDomain): OptionAbstract;

    /**
     * The withValue() method sets the value of the option.
     *
     * @param string $value The value of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withValue(string $value): OptionAbstract;

    /**
     * The withAttributes() method sets the HTML attributes of the option.
     *
     * @param array $attributes An array of HTML attributes, in the format
     *                    `['attr_name' => 'attr_value']`.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withAttributes(array $attributes): OptionAbstract;

    /**
     * The getId() method returns the ID of the option, as a string.
     *
     * @return string The ID of the option.
     */
    public function getId(): string;

    /**
     * The withLabel() method sets the label of the option.
     *
     * @param string $label The label of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withLabel(string $label): OptionAbstract;

    /**
     * The withDesc() method sets the description of the option.
     *
     * @param string $desc The description of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withDesc(string $desc): OptionAbstract;

    /**
     * The withHelp() method sets the help text of the option, which will be
     * displayed to users as a tooltip or popover.
     *
     * @param string $help The help text of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withHelp(string $help): OptionAbstract;

    /**
     * The getArrayCopy() method returns an array representation of the option,
     * in a format that can be used in WordPress and Unyson FW configuration files
     * or in an IDE.
     *
     * The method iterates over the properties of the object and compares them to
     * their default values. If the property has been modified from its default
     * value, it is added to the returned array.
     *
     * Before returning the array, the method checks that all required fields are
     * present in the option. If any required fields are missing, an exception is
     * thrown.
     *
     * @throws Exception If any required fields are missing from the option.
     *
     * @return array The array representation of the option.
     */
    public function getArrayCopy(): array;
}

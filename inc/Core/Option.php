<?php

namespace UnysonOptionsBuilder\Core;

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
     * The withAttr() method sets the HTML attributes of the option.
     *
     * @param array $attr An array of HTML attributes, in the format
     *                    `['attr_name' => 'attr_value']`.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withAttr(array $attr): OptionAbstract;

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
     * @return array
     */
    public function getArrayCopy(): array;
}

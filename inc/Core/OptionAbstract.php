<?php

namespace UnysonOptionsBuilder\Core;

use Exception;

/**
 * The OptionAbstract class is an abstract base class for implementing different
 * types of options in the Unyson Option Builder library.
 *
 * It provides methods for setting and retrieving option data, such as the
 * `withValue()` and `getArrayCopy()` methods, as well as methods for setting
 * and retrieving metadata, such as the `withLabel()` and `getType()` methods.
 *
 * The OptionAbstract class implements the Option interface, which defines the
 * methods that must be implemented by all option classes. This allows the
 * OptionAbstract class to be used as a base class for different option types,
 * such as text fields, select boxes, or checkboxes.
 *
 * The OptionAbstract class also defines several protected properties that are
 * shared by all option types, such as the `$value` property for storing the
 * option value, and the `$label` property for storing the option label.
 */
abstract class OptionAbstract implements Option
{
    /**
     * The $value property is a mixed type that will store the value of the option.
     *
     * @var string|bool
     */
    protected mixed $value = '';

    /**
     * The $attr property is an array that will store the HTML attributes of the
     * option, such as the `class` attribute or the `style` attribute.
     *
     * @var array
     */
    protected array $attr = [];

    /**
     * The $label property is a string that will store the label of the option,
     * which will be displayed to users as the option name or title.
     *
     * @var string
     */
    protected string $label = '';

    /**
     * The $desc property is a string that will store the description of the
     * option, which will be displayed to users as additional information about
     * the option.
     *
     * @var string
     */
    protected string $desc = '';

    /**
     * The $help property is a string that will store the help text of the
     * option, which will be displayed to users as a tooltip or popover when
     * they hover over the option.
     *
     * @var string
     */
    protected string $help = '';

    /**
     * The $textDomain property is a string that will store the text domain of
     * the option, which is used for internationalization and localization of
     * the option's label, description, and help text.
     *
     * @var string
     */
    protected string $textDomain = '';

    /**
     * The $id property is a string that will store the unique ID of the option.
     *
     * @var string
     */
    protected string $id = '';

    /**
     * The $properties property is an array that will store the properties of
     * the option, which are used by the `getArrayCopy()` method to determine
     * which properties should be included in the option array that is returned
     * by the `getArrayCopy()` method.
     *
     * @var array
     */
    protected array $properties;

    /**
     * The $requiredProperties property is an array that will store the names
     * of the required properties of the option, which are used by the
     * `hasRequiredFields()` method to check whether the option has all of
     * the required properties before it is converted to an option array.
     *
     * @var array
     */
    protected array $requiredProperties = [];

    /**
     * The __construct() method initializes the option object by fetching its
     * properties and setting its ID.
     *
     * @param string $id The unique ID of the option.
     */
    public function __construct(string $id)
    {
        $this->fetchProperties();
        $this->id = $id;
    }

    /**
     * The getId() method returns the unique ID of the option.
     *
     * @return string The unique ID of the option.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The withTextDomain() method sets the text domain of the option, which is used
     * to translate the option's label and description into the current language.
     *
     * If no text domain is specified, the default text domain of the current
     * WordPress theme is used.
     *
     * @param string $textDomain The text domain of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withTextDomain(string $textDomain): OptionAbstract
    {
        $this->textDomain = $textDomain;

        return $this;
    }

    /**
     * The withValue() method sets the value of the option.
     *
     * @param mixed $value The value of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withValue($value): OptionAbstract
    {
        $this->value = $value;

        return $this;
    }

    /**
     * The withAttr() method sets the HTML attributes of the option, such as the
     * `class` attribute or the `style` attribute.
     *
     * @param array $attr The HTML attributes of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withAttr(array $attr): OptionAbstract
    {
        $this->attr = $attr;

        return $this;
    }

    /**
     * The withLabel() method sets the label of the option, which will be
     * displayed to users as the option name or title.
     *
     * @param string $label The label of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withLabel(string $label): OptionAbstract
    {
        $this->label = $label;

        return $this;
    }

    /**
     * The withDesc() method sets the description of the option, which will be
     * displayed to users as additional information about the option.
     *
     * @param string $desc The description of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withDesc(string $desc): OptionAbstract
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * The withHelp() method sets the help text of the option, which will be
     * displayed to users as a tooltip or pop-up message when they hover over
     * the option.
     *
     * @param string $help The help text of the option.
     *
     * @return OptionAbstract The option object, for method chaining.
     */
    public function withHelp(string $help): OptionAbstract
    {
        $this->help = $help;

        return $this;
    }

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
    public function getArrayCopy(): array
    {
        $formatted_items = [];

        // Iterate over the object properties and add any modified properties
        // to the $data array
        foreach ($this->properties as $key => $value) {
            if (isset($this->{$key}) && $this->{$key} !== $value) {
                $converted_key        = $this->convertCamelToKebabCase($key);
                $formatted_items[$converted_key] = $this->{$key};
            }
        }

        // Check that all required fields are present in the option
        if (!$this->hasRequiredFields($formatted_items)) {
            $missing_fields = array_keys(array_diff_key($this->requiredProperties, $formatted_items));
            throw new Exception('This option is missing required fields: ' . join(', ', $missing_fields));
        }

        return $formatted_items;
    }

    /**
     * The getType() method is an abstract method that must be implemented
     * by the child classes of the OptionAbstract class. The method should
     * return the type of the option, such as "text" or "checkbox".
     *
     * @return string The type of the option.
     */
    abstract public function getType(): string;

    /**
     * The getTextDomain() method gets the text domain of the option, which
     * is used for internationalization and localization of the option's label,
     * description, and help text. If the text domain has not been set, the
     * method sets the text domain to the current theme's text domain.
     *
     * @return string The text domain of the option.
     */
    protected function getTextDomain(): string
    {
        // set default text domain
        if (empty($this->textDomain)) {
            $this->withTextDomain(wp_get_theme()->get('TextDomain'));
        }

        return $this->textDomain;
    }

    /**
     * The hasRequiredFields() method checks whether the option has all of the
     * required properties, as specified in the $requiredProperties property.
     *
     * @param array $fields The properties of the option.
     *
     * @return bool True if the option has all of the required properties,
     *              false otherwise.
     */
    private function hasRequiredFields($fields)
    {
        if (empty($this->requiredProperties)) {
            return true;
        }

        $missing_fields = array_diff_key($this->requiredProperties, $fields);

        return empty($missing_fields);
    }


    /**
     * The fetchProperties() method fetches the properties of the option,
     * which are stored in the $properties property.
     *
     * @return void
     */
    private function fetchProperties()
    {
        foreach (get_object_vars($this) as $index => $get_object_var) {
            $this->properties[$index] = $get_object_var;
        }
    }

    /**
     * The convertCamelToKebabCase() method converts a camel-case string to
     * a kebab-case string, by replacing the uppercase letters with dashes
     * followed by the lowercase version of the letter. For example,
     * "myCamelCaseString" would be converted to "my-camel-case-string".
     *
     * @param string $string The camel-case string to convert.
     *
     * @return string The kebab-case version of the input string.
     */
    private function convertCamelToKebabCase(string $string): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $string));
    }
}
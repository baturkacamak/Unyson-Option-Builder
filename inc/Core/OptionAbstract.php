<?php

namespace UnysonOptionsBuilder\Core;

use Exception;

abstract class OptionAbstract implements Option
{
    /**
     * @var string|bool
     */
    protected mixed $value = '';
    protected array $attr = [];
    protected string $label = '';
    protected string $desc = '';
    protected string $help = '';
    protected string $textDomain = '';
    protected string $id = '';
    protected array $properties;
    protected array $requiredProperties = [];

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->fetchProperties();
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $textDomain
     *
     * @return OptionAbstract
     */
    public function setTextDomain(string $textDomain): OptionAbstract
    {
        $this->textDomain = $textDomain;

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return OptionAbstract
     */
    public function setValue($value): OptionAbstract
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param array $attr
     *
     * @return OptionAbstract
     */
    public function setAttr(array $attr): OptionAbstract
    {
        $this->attr = $attr;

        return $this;
    }

    /**
     * @param string $label
     *
     * @return OptionAbstract
     */
    public function setLabel(string $label): OptionAbstract
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @param string $desc
     *
     * @return OptionAbstract
     */
    public function setDesc(string $desc): OptionAbstract
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * @param string $help
     *
     * @return OptionAbstract
     */
    public function setHelp(string $help): OptionAbstract
    {
        $this->help = $help;

        return $this;
    }

    /**
     * @throws Exception
     *
     * @return array
     */
    public function getArrayCopy(): array
    {
        $data = [];

        foreach ($this->properties as $key => $value) {
            if (isset($this->{$key}) && $this->{$key} !== $value) {
                $data[$key] = $this->{$key};
            }
        }

        if (!$this->hasRequiredFields($data)) {
            throw new Exception('This options has required fields: ' . join(', ', $this->requiredProperties));
        }


        return $data;
    }

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return string
     */
    protected function getTextDomain(): string
    {
        // set default text domain
        if (empty($this->textDomain)) {
            $this->setTextDomain(wp_get_theme()->get('TextDomain'));
        }

        return $this->textDomain;
    }

    private function hasRequiredFields($fields)
    {
        if (empty($this->requiredProperties)) {
            return true;
        }

        $array = array_flip($this->requiredProperties);

        $count = count(array_intersect_key($array, $fields));

        return 0 < $count;
    }

    private function fetchProperties()
    {
        foreach (get_object_vars($this) as $index => $get_object_var) {
            $this->properties[$index] = $get_object_var;
        }
    }
}

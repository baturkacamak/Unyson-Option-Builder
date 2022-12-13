<?php

namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;
use UnysonOptionsBuilder\Core\ValidatedOption;

/**
 *
 */
class Checkboxes extends OptionAbstract
{

    protected ValidatedOption $validator;

    /**
     * @var array
     */
    protected array $choices = [];

    /**
     * @var bool
     */
    protected bool $inline = false;

    /**
     * @var array|string[]
     */
    protected array $requiredProperties = ['choices'];

    public function __construct()
    {
        $this->validator = new ValidatedOption();
    }

    /**
     * @param bool $inline
     *
     * @return Checkboxes
     */
    public function withInline(bool $inline): Checkboxes
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return Checkboxes
     */
    public function withChoices(array $choices): Checkboxes
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @param array $value
     *
     * @return Checkboxes
     * @throws Exception
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
     * @return string
     */
    public function getType(): string
    {
        return 'checkboxes';
    }
}

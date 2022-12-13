<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class Select extends OptionAbstract
{
    /**
     * @var bool
     */
    protected bool $noValidate = false;

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

    /**
     * @param bool $noValidate
     *
     * @return Select
     */
    public function withNoValidate(bool $noValidate): Select
    {
        $this->noValidate = $noValidate;

        return $this;
    }

    /**
     * @param bool $inline
     *
     * @return Select
     */
    public function withInline(bool $inline): Select
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return Select
     */
    public function withChoices(array $choices): Select
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'select';
    }
}

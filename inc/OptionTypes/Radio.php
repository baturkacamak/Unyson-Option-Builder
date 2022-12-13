<?php

namespace UnysonOptionsBuilder\OptionTypes;

use UnysonOptionsBuilder\Core\OptionAbstract;

/**
 *
 */
class Radio extends OptionAbstract
{
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
     * @param bool $inline
     *
     * @return Radio
     */
    public function withInline(bool $inline): Radio
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * @param array $choices
     *
     * @return Radio
     */
    public function withChoices(array $choices): Radio
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'radio';
    }
}

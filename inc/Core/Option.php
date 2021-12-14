<?php

namespace UnysonOptionsBuilder\Core;

interface Option
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $textDomain
     *
     * @return OptionAbstract
     */
    public function setTextDomain(string $textDomain): OptionAbstract;

    /**
     * @param string $value
     *
     * @return OptionAbstract
     */
    public function setValue(string $value): OptionAbstract;

    /**
     * @param array $attr
     *
     * @return OptionAbstract
     */
    public function setAttr(array $attr): OptionAbstract;

    /**
     * @return string
     */
    public function getId(): string;
    
    /**
     * @param string $label
     *
     * @return OptionAbstract
     */
    public function setLabel(string $label): OptionAbstract;

    /**
     * @param string $desc
     *
     * @return OptionAbstract
     */
    public function setDesc(string $desc): OptionAbstract;

    /**
     * @param string $help
     *
     * @return OptionAbstract
     */
    public function setHelp(string $help): OptionAbstract;

    /**
     * @return array
     */
    public function getArrayCopy(): array;
}

<?php

namespace UnysonOptionsBuilder;

use UnysonOptionsBuilder\Core\Option;

class Builder
{
    protected array $options = [];

    /**
     * @param Option $option
     *
     * @return $this|Builder
     */
    public function addOption(Option $option): static
    {
        $this->options[$option->getId()] = $option;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        $data = [];

        /** @var Option $option */
        foreach ($this->options as $option) {
            $option_array = $option->getArrayCopy();
            $option_id    = $option_array['id'];
            unset($option_array['id']);
            $data[] = [
                $option_id => array_merge([
                    'type' => $option->getType(),
                ], $option_array),
            ];
        }

        return $data;
    }
}

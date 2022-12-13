<?php

namespace UnysonOptionsBuilder\OptionTypes;

use Exception;
use UnysonOptionsBuilder\Core\OptionAbstract;
use UnysonOptionsBuilder\Core\ValidatedOption;

/**
 *
 */
class ImagePicker extends OptionAbstract
{
    protected ValidatedOption $validator;

    public function __construct()
    {
        $this->validator = new ValidatedOption();
    }

    /**
     * @param array $value
     *
     * @throws Exception
     *
     * @return ImagePicker
     */
    public function withValue($value): ImagePicker
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
        return 'image-picker';
    }
}

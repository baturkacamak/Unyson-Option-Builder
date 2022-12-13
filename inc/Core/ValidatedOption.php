<?php
/**
 * Created by PhpStorm.
 * User: baturkacamak
 * Date: 13/12/22
 * Time: 8:20
 */

namespace UnysonOptionsBuilder\Core;

class ValidatedOption
{
    /**
     * This method will control the value is properly set
     * Example value array(
     * 'choice-1' => false,
     * 'choice-2' => true,
     * )
     *
     * @param $value
     *
     * @return bool
     */
    public function isValueValid($value): bool
    {
        return 0 === count(
                array_filter($value, function ($array_value, $array_key) {
                    return !is_bool($array_value) || !is_string($array_key);
                }, ARRAY_FILTER_USE_BOTH)
            );
    }
}
<?php

namespace Hakier\Core\Tool;

use Hakier\Core\Type\Object;

class ArrayHelper extends Object
{
    /**
     * Return value of array if key exist.
     * If not will return $var
     *
     * @param array      &$array
     * @param string|int $key
     * @param mixed|null $var
     *
     * @return mixed
     */
    public static function returnValueOrVar(&$array, $key, $var = null)
    {
        return isset($array[$key]) ? $array[$key] : $var;
    }

    /**
     * Return value of array if key exist or null.
     *
     * @param array      &$array
     * @param string|int $key
     *
     * @return mixed|null
     */
    public static function returnValueOrNull(&$array, $key)
    {
        return isset($array[$key]) ? $array[$key] : null;
    }
}
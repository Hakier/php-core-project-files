<?php

namespace Hakier\Core\Tool;

use Hakier\Core\Type\Object;

/**
 * Class String
 *
 * @package Hakier\Tool
 */
class String extends Object
{
    /**
     * @param string $string
     *
     * @return string
     */
    public static function camelCaseToDashed($string)
    {
        return preg_replace(
            '/([A-Z])/e',
            'strtolower("_".$1)',
            $string
        );
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function dashedToUpperCamelCase($string)
    {
        return ucfirst(
            self::dashedToCamelCase($string)
        );
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function dashedToCamelCase($string)
    {
        return preg_replace(
            '/_([a-z]*)/e',
            'ucfirst($1)',
            $string
        );
    }
}
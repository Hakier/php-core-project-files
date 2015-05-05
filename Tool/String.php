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
        return preg_replace_callback(
            '/([A-Z])/',
            function (array $matches) {
                return isset($matches[1])
                    ? strtolower("_" . $matches[1])
                    : null;
            },
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
        return preg_replace_callback(
            '/_([a-z]*)/',
            function (array $matches) {
                return isset($matches[1])
                    ? ucfirst($matches[1])
                    : null;
            },
            $string
        );
    }
}
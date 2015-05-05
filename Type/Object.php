<?php

namespace Hakier\Core\Type;

/**
 * Class Object
 *
 * @package Hakier\Type
 */
class Object
{
    /**
     * Return class name with namespace included
     *
     * @return string
     */
    public static function getFullClassName()
    {
        return get_called_class();
    }
}
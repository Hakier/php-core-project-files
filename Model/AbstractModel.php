<?php

namespace Hakier\Core\Model;

use Hakier\Core\Tool\String;
use Hakier\Core\Type\Object;

abstract class AbstractModel extends Object
{
    /**
     * Contain translation from db field name to object property name
     * if other than dashed case in db and camelCase in object
     *
     * @var array
     */
    protected static $_dictDbNameToPropertyName = array();
    protected static $_dictPropertyNameToDbName = null;

    /**
     * @param array|null $data
     */
    public function __construct($data = null)
    {
        $this->_setData($data);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getData()
    {
        if (static::$_dictPropertyNameToDbName === null) {
            static::$_dictPropertyNameToDbName = array_flip(static::$_dictDbNameToPropertyName);
        }

        $reflection = new \ReflectionClass($this);
        $data       = array();

        foreach ($reflection->getProperties() as $property) {
            $name = preg_replace('/^_/', null, $property->getName());

            if (in_array($name, array('dictDbNameToPropertyName', 'dictPropertyNameToDbName'))) {
                continue;
            }

            $getterName  = 'get' . ucfirst($name);
            $dbFieldName = self::_translatePropertyNameToDbFieldName($name);

            if (!method_exists($this, $getterName)) {
                throw new \Exception(
                    sprintf(
                        'No %s method in %s',
                        $getterName,
                        get_class($this)
                    )
                );
            }

            $data[$dbFieldName] = $this->{$getterName}();

            if (is_object($data[$dbFieldName]) && method_exists($data[$dbFieldName], 'getData')) {
                $data[$dbFieldName] = $data[$dbFieldName]->getData();
            }
        }

        return $data;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected static function _translateDbFieldNameToPropertyName($name)
    {
        if (isset(static::$_dictDbNameToPropertyName[$name])) {
            return static::$_dictDbNameToPropertyName[$name];
        }

        return String::dashedToCamelCase($name);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected static function _translatePropertyNameToDbFieldName($name)
    {
        if (isset(static::$_dictPropertyNameToDbName[$name])) {
            return static::$_dictPropertyNameToDbName[$name];
        }

        return String::camelCaseToDashed($name);
    }

    /**
     * @param array $data
     *
     * @throws \Exception if no setter for field
     */
    protected function _setData($data)
    {
        if (!is_array($data)) {
            return;
        }

        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst(
                    self::_translateDbFieldNameToPropertyName($key)
                );

            if (!method_exists($this, $methodName)) {
                throw new \Exception(
                    sprintf(
                        'No such setter: %s in class: %s',
                        $methodName,
                        self::getFullClassName()
                    )
                );
            }

            $this->{$methodName}($value);
        }
    }
}
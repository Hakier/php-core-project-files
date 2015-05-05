<?php

namespace Hakier\Core\Type;

class Map extends \ArrayIterator
{
    /**
     * @var array
     */
    protected $_array = array();

    /**
     * @param array|null  $array
     * @param null|string $toClass map elements will be casted to this class
     */
    public function __construct($array = null, $toClass = null)
    {
        $this->_setOrInit($array);

        if ($toClass) {
            $this->castElementsToClass($toClass);
        }
    }

    /**
     * Return all the keys of an array
     *
     * @return array an array of all the keys in input.
     */
    public function getKeys()
    {
        return array_keys(
            $this->getArray()
        );
    }

    /**
     * Return all the values of an array
     *
     * @return array an indexed array of values.
     */
    public function getValues()
    {
        return array_values(
            $this->getArray()
        );
    }

    /**
     * @param string $glue
     *
     * @return \Hakier\Type\String
     */
    public function implode($glue = "\n")
    {
        return new String(
            implode(
                $glue,
                $this->getArray()
            )
        );
    }

    /**
     * @param callable $callback
     *
     * @return $this
     */
    public function map($callback)
    {
        $this->_array = array_map($callback, $this->_array);

        return $this;
    }

    /**
     * @param callable $callback
     *
     * @return $this
     */
    public function filter($callback)
    {
        $this->_array = array_filter($this->_array, $callback);

        return $this;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->_array;
    }

    /**
     * @param array $array
     */
    public function setArray($array)
    {
        $this->_array = $array;
    }

    /**
     * @param $array
     */
    protected function _setOrInit($array)
    {
        if (is_array($array)) {
            $this->_array = $array;
        }
    }

    /**
     * @param string $toClass
     *
     * @throws \Exception
     */
    protected function castElementsToClass($toClass)
    {
        if (!class_exists($toClass)) {
            throw new \Exception('Tried to cast to non existing class: ' . $toClass);
        }

        $this->map(
            function ($string) use ($toClass) {
                return new $toClass($string);
            }
        );
    }
}
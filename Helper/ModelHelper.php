<?php

namespace Hakier\Core\Helper;

class ModelHelper
{
    /**
     * @param $arrayOfData
     * @param $objectName
     *
     * @return array|Object[]
     * @throws \Exception
     */
    public static function castManyToObjects($arrayOfData, $objectName)
    {
        if (!is_array($arrayOfData) || !is_array(reset($arrayOfData))) {
            throw new \Exception('Bad format of $arrayOfData');
        }

        $arrayOfObjects = array();

        foreach ($arrayOfData as $key => $data) {
            $arrayOfObjects[] = self::castOneToObject($data, $objectName);
        }

        return $arrayOfObjects;
    }

    /**
     * @param $data
     * @param $objectName
     *
     * @return Object
     * @throws \Exception
     */
    public static function castOneToObject($data, $objectName)
    {
        if (!is_array($data)) {
            throw new \Exception('Bad format of $data');
        }

        if (!class_exists($objectName)) {
            throw new \Exception(sprintf('Class %s not exist', $objectName));
        }

        return new $objectName($data);
    }
}
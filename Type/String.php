<?php

namespace Hakier\Core\Type;

class String extends Object
{
    /**
     * @var string
     */
    protected $_string = null;

    public function __construct($string)
    {
        $this->setString($string);
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * Return a formatted string
     * @link http://php.net/manual/en/function.sprintf.php
     * @param string $format <p>
     * The format string is composed of zero or more directives:
     * ordinary characters (excluding %) that are
     * copied directly to the result, and conversion
     * specifications, each of which results in fetching its
     * own parameter. This applies to both sprintf
     * and printf.
     * </p>
     * <p>
     * Each conversion specification consists of a percent sign
     * (%), followed by one or more of these
     * elements, in order:
     * An optional sign specifier that forces a sign
     * (- or +) to be used on a number. By default, only the - sign is used
     * on a number if it's negative. This specifier forces positive numbers
     * to have the + sign attached as well, and was added in PHP 4.3.0.
     * @return string a string produced according to the formatting string
     * format.
     */
    public function format($format)
    {
        return sprintf($format, $this->getString());
    }

    /**
     * @param string $delimiter
     * @param null   $limit
     *
     * @return array
     */

    /**
     * Split a string by string
     *
     * @param string $delimiter <p>
     *                          The boundary string.
     *                          </p>
     * @param int    $limit     [optional] <p>
     *                          If limit is set and positive, the returned array will contain
     *                          a maximum of limit elements with the last
     *                          element containing the rest of string.
     *                          </p>
     *                          <p>
     *                          If the limit parameter is negative, all components
     *                          except the last -limit are returned.
     *                          </p>
     *                          <p>
     *                          If the limit parameter is zero, then this is treated as 1.
     *                          </p>
     *
     * @return Map If delimiter is an empty string (""),
     * explode will return false.
     * If delimiter contains a value that is not
     * contained in string and a negative
     * limit is used, then an empty array will be
     * returned. For any other limit, an array containing
     * string will be returned.
     */
    public function explode($delimiter = "\n", $limit = null)
    {
        $explodedArray = $this->_explode($delimiter, $limit);

        return $explodedArray
            ? new Map(
                $explodedArray,
                $this::getClass()
            )
            : $explodedArray;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getString();
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->_string;
    }

    /**
     * @param string $string
     */
    public function setString($string)
    {
        $this->_string = $string;
    }

    /**
     * Split a string by string
     *
     * @param string $delimiter <p>
     * The boundary string.
     * </p>
     * @param int $limit [optional] <p>
     * If limit is set and positive, the returned array will contain
     * a maximum of limit elements with the last
     * element containing the rest of string.
     * </p>
     *
     * @return array If delimiter is an empty string (""),
     * explode will return false.
     * If delimiter contains a value that is not
     * contained in string and a negative
     * limit is used, then an empty array will be
     * returned. For any other limit, an array containing
     * string will be returned.
     */
    protected function _explode($delimiter, $limit)
    {
        return $limit === null
            ? explode(
                $delimiter,
                $this->getString()
            )
            : explode(
                $delimiter,
                $this->getString(),
                $limit
            );
    }
}
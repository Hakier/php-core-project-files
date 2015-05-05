<?php

namespace Hakier\Core\Type;

use Hakier\Core\Model\AbstractModel;

class Url extends AbstractModel
{
    const SCHEME_HTTP = 'http';

    /**
     * @var string
     */
    protected $_scheme = null;

    /**
     * @var string
     */
    protected $_host = null;

    /**
     * @var int
     */
    protected $_port = null;

    /**
     * @var string
     */
    protected $_user = null;

    /**
     * @var string
     */
    protected $_pass = null;

    /**
     * @var string
     */
    protected $_path = null;

    /**
     * @var string
     */
    protected $_query = null;

    /**
     * @var string
     */
    protected $_anchor = null;

    public function __construct($urlString = null)
    {
        if ($urlString === null) {
            return;
        }

        parent::__construct(
            parse_url($urlString)
        );
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->_scheme;
    }

    /**
     * @param string $scheme
     *
     * @return $this
     */
    public function setScheme($scheme)
    {
        $this->_scheme = $scheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * @param string $host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->_host = $host;

        return $this;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->_port;
    }

    /**
     * @param int $port
     *
     * @return $this
     */
    public function setPort($port)
    {
        $this->_port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param string $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->_user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->_pass;
    }

    /**
     * @param string $pass
     *
     * @return $this
     */
    public function setPass($pass)
    {
        $this->_pass = $pass;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->_path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * @param string $query
     *
     * @return $this
     */
    public function setQuery($query)
    {
        $this->_query = $query;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnchor()
    {
        return $this->_anchor;
    }

    /**
     * @param string $anchor
     *
     * @return $this
     */
    public function setAnchor($anchor)
    {
        $this->_anchor = $anchor;

        return $this;
    }
}

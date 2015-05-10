<?php

namespace Hakier\Core\Type;

use Hakier\Core\Model\AbstractModel;

class Url extends AbstractModel
{
    const SCHEME_HTTP = 'http';

    /**
     * Contains $urlString from construct
     *
     * @var string
     */
    protected $_urlString = null;

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
    protected $_fragment = null;

    public function __construct($urlString = null)
    {
        if ($urlString === null) {
            return;
        }

        parent::__construct(
            parse_url($this->_urlString = $urlString)
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
        $this->_scheme = (string) $scheme;

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
        $this->_host = (string) $host;

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
        $this->_port = (int) $port;

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
        $this->_user = (string) $user;

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
        $this->_pass = (string) $pass;

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
        $this->_path = (string) $path;

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
        $this->_query = (string) $query;

        return $this;
    }

    /**
     * @return string
     */
    public function getFragment()
    {
        return $this->_fragment;
    }

    /**
     * @param string $fragment
     *
     * @return $this
     */
    public function setFragment($fragment)
    {
        $this->_fragment = (string) $fragment;

        return $this;
    }
}

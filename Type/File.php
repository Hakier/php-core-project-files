<?php

namespace Hakier\Core\Type;

class File extends Object
{
    /**
     * @var string
     */
    protected $_filePath = null;

    public function __construct($filePath)
    {
        if (!is_file($filePath)) {
            throw new \Exception('File not exist: ' . $filePath);
        }

        $this->setFilePath($filePath);
    }

    /**
     * @return \Hakier\Type\String
     */
    public function getContents()
    {
        return new String(
            $this->_getContents()
        );
    }

    /**
     * @param string $delimiter
     * @param null| $limit
     *
     * @return Map|String[]
     */
    public function getContentsAsMap($delimiter = "\n", $limit = null)
    {
        return $this->getContents()->explode($delimiter, $limit);
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->_filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->_filePath = $filePath;
    }

    /**
     * @return string
     */
    protected function _getContents()
    {
        return file_get_contents(
            $this->_filePath
        );
    }
}
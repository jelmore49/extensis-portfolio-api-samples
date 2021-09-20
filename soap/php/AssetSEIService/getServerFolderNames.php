<?php

class getServerFolderNames
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $parentPath
     * @access public
     */
    public $parentPath = null;

    /**
     * @param string $sessionId
     * @param string $parentPath
     * @access public
     */
    public function __construct($sessionId, $parentPath)
    {
      $this->sessionId = $sessionId;
      $this->parentPath = $parentPath;
    }

}

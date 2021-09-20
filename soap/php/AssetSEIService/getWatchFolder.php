<?php

class getWatchFolder
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var string $folderId
     * @access public
     */
    public $folderId = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $folderId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $folderId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->folderId = $folderId;
    }

}

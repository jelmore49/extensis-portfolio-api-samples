<?php

class getFolderTreeForWatchFolder
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
     * @var string $watchFolderId
     * @access public
     */
    public $watchFolderId = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $watchFolderId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $watchFolderId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->watchFolderId = $watchFolderId;
    }

}

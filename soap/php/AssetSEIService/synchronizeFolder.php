<?php

class synchronizeFolder
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
     * @var string $relativeFolderPath
     * @access public
     */
    public $relativeFolderPath = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $watchFolderId
     * @param string $relativeFolderPath
     * @access public
     */
    public function __construct($sessionId, $catalogId, $watchFolderId, $relativeFolderPath)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->watchFolderId = $watchFolderId;
      $this->relativeFolderPath = $relativeFolderPath;
    }

}

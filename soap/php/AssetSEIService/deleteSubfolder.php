<?php

class deleteSubfolder
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
     * @var string $relativePath
     * @access public
     */
    public $relativePath = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $watchFolderId
     * @param string $relativePath
     * @access public
     */
    public function __construct($sessionId, $catalogId, $watchFolderId, $relativePath)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->watchFolderId = $watchFolderId;
      $this->relativePath = $relativePath;
    }

}

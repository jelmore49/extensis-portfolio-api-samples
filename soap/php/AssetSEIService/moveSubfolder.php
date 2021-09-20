<?php

class moveSubfolder
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
     * @var string $sourceWatchFolderId
     * @access public
     */
    public $sourceWatchFolderId = null;

    /**
     * @var string $sourceRelativeFolderPath
     * @access public
     */
    public $sourceRelativeFolderPath = null;

    /**
     * @var string $destinationWatchFolderId
     * @access public
     */
    public $destinationWatchFolderId = null;

    /**
     * @var string $destinationRelativeFolderPath
     * @access public
     */
    public $destinationRelativeFolderPath = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $sourceWatchFolderId
     * @param string $sourceRelativeFolderPath
     * @param string $destinationWatchFolderId
     * @param string $destinationRelativeFolderPath
     * @access public
     */
    public function __construct($sessionId, $catalogId, $sourceWatchFolderId, $sourceRelativeFolderPath, $destinationWatchFolderId, $destinationRelativeFolderPath)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->sourceWatchFolderId = $sourceWatchFolderId;
      $this->sourceRelativeFolderPath = $sourceRelativeFolderPath;
      $this->destinationWatchFolderId = $destinationWatchFolderId;
      $this->destinationRelativeFolderPath = $destinationRelativeFolderPath;
    }

}

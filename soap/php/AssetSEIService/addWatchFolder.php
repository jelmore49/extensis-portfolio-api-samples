<?php

class addWatchFolder
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
     * @var watchFolder $folder
     * @access public
     */
    public $folder = null;

    /**
     * @var boolean $createFolderOnDisk
     * @access public
     */
    public $createFolderOnDisk = null;

    /**
     * @var boolean $combineChildFolders
     * @access public
     */
    public $combineChildFolders = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param watchFolder $folder
     * @param boolean $createFolderOnDisk
     * @param boolean $combineChildFolders
     * @access public
     */
    public function __construct($sessionId, $catalogId, $folder, $createFolderOnDisk, $combineChildFolders)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->folder = $folder;
      $this->createFolderOnDisk = $createFolderOnDisk;
      $this->combineChildFolders = $combineChildFolders;
    }

}

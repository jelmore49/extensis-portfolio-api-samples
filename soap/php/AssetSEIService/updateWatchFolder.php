<?php

class updateWatchFolder
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
     * @param string $sessionId
     * @param string $catalogId
     * @param watchFolder $folder
     * @access public
     */
    public function __construct($sessionId, $catalogId, $folder)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->folder = $folder;
    }

}

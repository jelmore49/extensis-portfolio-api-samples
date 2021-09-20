<?php

class removeAssetsFromCatalog
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
     * @var assetQuery $assets
     * @access public
     */
    public $assets = null;

    /**
     * @var boolean $deleteOriginalFromDisk
     * @access public
     */
    public $deleteOriginalFromDisk = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param assetQuery $assets
     * @param boolean $deleteOriginalFromDisk
     * @access public
     */
    public function __construct($sessionId, $catalogId, $assets, $deleteOriginalFromDisk)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->assets = $assets;
      $this->deleteOriginalFromDisk = $deleteOriginalFromDisk;
    }

}

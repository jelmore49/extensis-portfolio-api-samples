<?php

class removeItemsFromGallery
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
     * @var string $galleryId
     * @access public
     */
    public $galleryId = null;

    /**
     * @var assetQuery $assets
     * @access public
     */
    public $assets = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $galleryId
     * @param assetQuery $assets
     * @access public
     */
    public function __construct($sessionId, $catalogId, $galleryId, $assets)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->galleryId = $galleryId;
      $this->assets = $assets;
    }

}

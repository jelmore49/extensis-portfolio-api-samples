<?php

class deleteGallery
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
     * @param string $sessionId
     * @param string $catalogId
     * @param string $galleryId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $galleryId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->galleryId = $galleryId;
    }

}

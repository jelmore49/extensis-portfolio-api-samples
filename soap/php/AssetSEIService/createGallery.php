<?php

class createGallery
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
     * @var gallery $gallery
     * @access public
     */
    public $gallery = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param gallery $gallery
     * @access public
     */
    public function __construct($sessionId, $catalogId, $gallery)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->gallery = $gallery;
    }

}

<?php

class setUserViewSettings
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
     * @var string $settings
     * @access public
     */
    public $settings = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $settings
     * @access public
     */
    public function __construct($sessionId, $catalogId, $settings)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->settings = $settings;
    }

}

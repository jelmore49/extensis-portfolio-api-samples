<?php

class setUserPreferences
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $settings
     * @access public
     */
    public $settings = null;

    /**
     * @param string $sessionId
     * @param string $settings
     * @access public
     */
    public function __construct($sessionId, $settings)
    {
      $this->sessionId = $sessionId;
      $this->settings = $settings;
    }

}

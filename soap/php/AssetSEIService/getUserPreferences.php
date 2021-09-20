<?php

class getUserPreferences
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @param string $sessionId
     * @access public
     */
    public function __construct($sessionId)
    {
      $this->sessionId = $sessionId;
    }

}

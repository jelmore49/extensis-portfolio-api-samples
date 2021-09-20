<?php

class setSessionInactivityTimeout
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var int $timeoutInSeconds
     * @access public
     */
    public $timeoutInSeconds = null;

    /**
     * @param string $sessionId
     * @param int $timeoutInSeconds
     * @access public
     */
    public function __construct($sessionId, $timeoutInSeconds)
    {
      $this->sessionId = $sessionId;
      $this->timeoutInSeconds = $timeoutInSeconds;
    }

}

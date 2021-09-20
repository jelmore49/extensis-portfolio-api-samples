<?php

class getStatusForJobs
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string[] $jobIds
     * @access public
     */
    public $jobIds = null;

    /**
     * @param string $sessionId
     * @access public
     */
    public function __construct($sessionId)
    {
      $this->sessionId = $sessionId;
    }

}

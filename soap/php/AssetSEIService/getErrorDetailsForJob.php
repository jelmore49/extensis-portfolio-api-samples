<?php

class getErrorDetailsForJob
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $jobId
     * @access public
     */
    public $jobId = null;

    /**
     * @param string $sessionId
     * @param string $jobId
     * @access public
     */
    public function __construct($sessionId, $jobId)
    {
      $this->sessionId = $sessionId;
      $this->jobId = $jobId;
    }

}

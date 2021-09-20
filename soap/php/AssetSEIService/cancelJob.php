<?php

class cancelJob
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
     * @var boolean $deleteJob
     * @access public
     */
    public $deleteJob = null;

    /**
     * @param string $sessionId
     * @param string $jobId
     * @param boolean $deleteJob
     * @access public
     */
    public function __construct($sessionId, $jobId, $deleteJob)
    {
      $this->sessionId = $sessionId;
      $this->jobId = $jobId;
      $this->deleteJob = $deleteJob;
    }

}

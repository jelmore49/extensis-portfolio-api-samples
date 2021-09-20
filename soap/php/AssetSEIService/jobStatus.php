<?php

class jobStatus
{

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var string $description
     * @access public
     */
    public $description = null;

    /**
     * @var attribute[] $jobDetails
     * @access public
     */
    public $jobDetails = null;

    /**
     * @var string $jobId
     * @access public
     */
    public $jobId = null;

    /**
     * @var jobStatusType $status
     * @access public
     */
    public $status = null;

    /**
     * @var string $timeCompleted
     * @access public
     */
    public $timeCompleted = null;

    /**
     * @var string $timeSubmitted
     * @access public
     */
    public $timeSubmitted = null;

    /**
     * @param string $catalogId
     * @param string $description
     * @param string $jobId
     * @param jobStatusType $status
     * @param string $timeCompleted
     * @param string $timeSubmitted
     * @access public
     */
    public function __construct($catalogId, $description, $jobId, $status, $timeCompleted, $timeSubmitted)
    {
      $this->catalogId = $catalogId;
      $this->description = $description;
      $this->jobId = $jobId;
      $this->status = $status;
      $this->timeCompleted = $timeCompleted;
      $this->timeSubmitted = $timeSubmitted;
    }

}

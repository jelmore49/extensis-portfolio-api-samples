<?php

class job
{

    /**
     * @var semaphore $completionSemaphore
     * @access public
     */
    public $completionSemaphore = null;

    /**
     * @var locale $clientLocale
     * @access public
     */
    public $clientLocale = null;

    /**
     * @var int $clientTimeZoneOffset
     * @access public
     */
    public $clientTimeZoneOffset = null;

    /**
     * @var string $description
     * @access public
     */
    public $description = null;

    /**
     * @var string $jobId
     * @access public
     */
    public $jobId = null;

    /**
     * @var sourceImage $sourceImage
     * @access public
     */
    public $sourceImage = null;

    /**
     * @var task[] $tasks
     * @access public
     */
    public $tasks = null;

    /**
     * @param semaphore $completionSemaphore
     * @param locale $clientLocale
     * @param int $clientTimeZoneOffset
     * @param string $description
     * @param string $jobId
     * @param sourceImage $sourceImage
     * @access public
     */
    public function __construct($sourceImage)
    {
      $this->sourceImage = $sourceImage;
    }

}

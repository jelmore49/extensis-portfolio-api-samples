<?php

class watchFolder
{

    /**
     * @var string $catalogingOptionsId
     * @access public
     */
    public $catalogingOptionsId = null;

    /**
     * @var int $currentStatus
     * @access public
     */
    public $currentStatus = null;

    /**
     * @var string $path
     * @access public
     */
    public $path = null;

    /**
     * @var boolean $removeMissingItems
     * @access public
     */
    public $removeMissingItems = null;

    /**
     * @var boolean $scanContinuouslyForChanges
     * @access public
     */
    public $scanContinuouslyForChanges = null;

    /**
     * @var int $syncFrequencyInSeconds
     * @access public
     */
    public $syncFrequencyInSeconds = null;

    /**
     * @var int $syncStartTimeInSecondsFromMidnight
     * @access public
     */
    public $syncStartTimeInSecondsFromMidnight = null;

    /**
     * @var syncOptions $synchronize
     * @access public
     */
    public $synchronize = null;

    /**
     * @var string $watchFolderId
     * @access public
     */
    public $watchFolderId = null;

    /**
     * @param string $catalogingOptionsId
     * @param int $currentStatus
     * @param string $path
     * @param boolean $removeMissingItems
     * @param boolean $scanContinuouslyForChanges
     * @param int $syncFrequencyInSeconds
     * @param int $syncStartTimeInSecondsFromMidnight
     * @param syncOptions $synchronize
     * @param string $watchFolderId
     * @access public
     */
    public function __construct($catalogingOptionsId, $currentStatus, $path, $removeMissingItems, $scanContinuouslyForChanges, $syncFrequencyInSeconds, $syncStartTimeInSecondsFromMidnight, $synchronize, $watchFolderId)
    {
      $this->catalogingOptionsId = $catalogingOptionsId;
      $this->currentStatus = $currentStatus;
      $this->path = $path;
      $this->removeMissingItems = $removeMissingItems;
      $this->scanContinuouslyForChanges = $scanContinuouslyForChanges;
      $this->syncFrequencyInSeconds = $syncFrequencyInSeconds;
      $this->syncStartTimeInSecondsFromMidnight = $syncStartTimeInSecondsFromMidnight;
      $this->synchronize = $synchronize;
      $this->watchFolderId = $watchFolderId;
    }

}

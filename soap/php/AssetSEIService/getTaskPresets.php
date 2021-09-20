<?php

class getTaskPresets
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
     * @var string $taskType
     * @access public
     */
    public $taskType = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $taskType
     * @access public
     */
    public function __construct($sessionId, $catalogId, $taskType)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->taskType = $taskType;
    }

}

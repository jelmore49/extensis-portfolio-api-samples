<?php

class updateTaskPreset
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var task $task
     * @access public
     */
    public $task = null;

    /**
     * @param string $sessionId
     * @param task $task
     * @access public
     */
    public function __construct($sessionId, $task)
    {
      $this->sessionId = $sessionId;
      $this->task = $task;
    }

}

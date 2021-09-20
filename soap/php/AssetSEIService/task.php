<?php

class task
{

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var attribute[] $settings
     * @access public
     */
    public $settings = null;

    /**
     * @var string $taskId
     * @access public
     */
    public $taskId = null;

    /**
     * @var taskType $type
     * @access public
     */
    public $type = null;

    /**
     * @param string $catalogId
     * @param string $name
     * @param taskType $type
     * @access public
     */
    public function __construct($catalogId, $name, $type)
    {
      $this->catalogId = $catalogId;
      $this->name = $name;
      $this->type = $type;
    }

}

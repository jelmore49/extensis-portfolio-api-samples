<?php

class updateTaskPresetResponse
{

    /**
     * @var task $return
     * @access public
     */
    public $return = null;

    /**
     * @param task $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

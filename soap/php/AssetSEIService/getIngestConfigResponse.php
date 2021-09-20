<?php

class getIngestConfigResponse
{

    /**
     * @var ingestConfig $return
     * @access public
     */
    public $return = null;

    /**
     * @param ingestConfig $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

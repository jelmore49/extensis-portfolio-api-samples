<?php

class getCatalogingOptionsResponse
{

    /**
     * @var catalogingOptions $return
     * @access public
     */
    public $return = null;

    /**
     * @param catalogingOptions $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

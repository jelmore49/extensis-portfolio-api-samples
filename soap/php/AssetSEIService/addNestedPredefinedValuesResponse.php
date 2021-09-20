<?php

class addNestedPredefinedValuesResponse
{

    /**
     * @var nestedValue[] $return
     * @access public
     */
    public $return = null;

    /**
     * @param nestedValue[] $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

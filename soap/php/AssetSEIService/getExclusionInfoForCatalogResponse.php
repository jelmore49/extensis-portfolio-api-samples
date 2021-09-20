<?php

class getExclusionInfoForCatalogResponse
{

    /**
     * @var exclusionInfo $return
     * @access public
     */
    public $return = null;

    /**
     * @param exclusionInfo $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

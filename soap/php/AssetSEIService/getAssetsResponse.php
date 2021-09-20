<?php

class getAssetsResponse
{

    /**
     * @var assetQueryResults $return
     * @access public
     */
    public $return = null;

    /**
     * @param assetQueryResults $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

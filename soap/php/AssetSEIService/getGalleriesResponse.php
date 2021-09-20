<?php

class getGalleriesResponse
{

    /**
     * @var gallery[] $return
     * @access public
     */
    public $return = null;

    /**
     * @param gallery[] $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

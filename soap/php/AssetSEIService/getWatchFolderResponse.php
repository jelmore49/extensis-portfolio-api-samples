<?php

class getWatchFolderResponse
{

    /**
     * @var watchFolder $return
     * @access public
     */
    public $return = null;

    /**
     * @param watchFolder $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

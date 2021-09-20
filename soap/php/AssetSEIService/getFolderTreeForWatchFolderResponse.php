<?php

class getFolderTreeForWatchFolderResponse
{

    /**
     * @var folder $return
     * @access public
     */
    public $return = null;

    /**
     * @param folder $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

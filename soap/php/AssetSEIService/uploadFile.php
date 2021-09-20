<?php

class uploadFile
{

    /**
     * @var string $arg0
     * @access public
     */
    public $arg0 = null;

    /**
     * @var string $arg1
     * @access public
     */
    public $arg1 = null;

    /**
     * @var string $arg2
     * @access public
     */
    public $arg2 = null;

    /**
     * @var string $arg3
     * @access public
     */
    public $arg3 = null;

    /**
     * @var base64Binary $arg4
     * @access public
     */
    public $arg4 = null;

    /**
     * @param string $arg0
     * @param string $arg1
     * @param string $arg2
     * @param string $arg3
     * @access public
     */
    public function __construct($arg0, $arg1, $arg2, $arg3)
    {
      $this->arg0 = $arg0;
      $this->arg1 = $arg1;
      $this->arg2 = $arg2;
      $this->arg3 = $arg3;
    }

}

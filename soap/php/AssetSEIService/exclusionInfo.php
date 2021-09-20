<?php

class exclusionInfo
{

    /**
     * @var boolean $allowAllExtensions
     * @access public
     */
    public $allowAllExtensions = null;

    /**
     * @var string[] $allowedExtensions
     * @access public
     */
    public $allowedExtensions = null;

    /**
     * @var attribute[] $pathExclusions
     * @access public
     */
    public $pathExclusions = null;

    /**
     * @param boolean $allowAllExtensions
     * @access public
     */
    public function __construct($allowAllExtensions)
    {
      $this->allowAllExtensions = $allowAllExtensions;
    }

}

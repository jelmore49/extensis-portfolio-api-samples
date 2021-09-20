<?php

class keySpecification
{

    /**
     * @var string $exponent
     * @access public
     */
    public $exponent = null;

    /**
     * @var string $modulusBase16
     * @access public
     */
    public $modulusBase16 = null;

    /**
     * @param string $exponent
     * @param string $modulusBase16
     * @access public
     */
    public function __construct($exponent, $modulusBase16)
    {
      $this->exponent = $exponent;
      $this->modulusBase16 = $modulusBase16;
    }

}

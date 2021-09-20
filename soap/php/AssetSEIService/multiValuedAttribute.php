<?php

class multiValuedAttribute
{

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var string[] $values
     * @access public
     */
    public $values = null;

    /**
     * @param string $name
     * @access public
     */
    public function __construct($name)
    {
      $this->name = $name;
    }

}

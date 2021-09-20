<?php

class attribute
{

    /**
     * @var string $value
     * @access public
     */
    public $value = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @param string $value
     * @param string $name
     * @access public
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

}

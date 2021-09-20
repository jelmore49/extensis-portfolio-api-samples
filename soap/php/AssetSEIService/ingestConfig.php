<?php

class ingestConfig
{

    /**
     * @var ingestField[] $fields
     * @access public
     */
    public $fields = null;

    /**
     * @var string $headerText
     * @access public
     */
    public $headerText = null;

    /**
     * @param string $headerText
     * @access public
     */
    public function __construct($headerText)
    {
      $this->headerText = $headerText;
    }

}

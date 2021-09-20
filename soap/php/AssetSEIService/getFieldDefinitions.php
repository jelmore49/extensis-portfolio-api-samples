<?php

class getFieldDefinitions
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var string[] $fieldNames
     * @access public
     */
    public $fieldNames = null;

    /**
     * @var boolean $getPredefinedValues
     * @access public
     */
    public $getPredefinedValues = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param boolean $getPredefinedValues
     * @access public
     */
    public function __construct($sessionId, $catalogId, $getPredefinedValues)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->getPredefinedValues = $getPredefinedValues;
    }

}

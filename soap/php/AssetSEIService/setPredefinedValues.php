<?php

class setPredefinedValues
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
     * @var fieldDefinition $fieldDefinition
     * @access public
     */
    public $fieldDefinition = null;

    /**
     * @var string[] $predefinedValues
     * @access public
     */
    public $predefinedValues = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param fieldDefinition $fieldDefinition
     * @param string[] $predefinedValues
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinition, $predefinedValues)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinition = $fieldDefinition;
      $this->predefinedValues = $predefinedValues;
    }

}

<?php

class addOrRemovePredefinedValues
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
     * @var string[] $addPredefinedValues
     * @access public
     */
    public $addPredefinedValues = null;

    /**
     * @var string[] $removePredefinedValues
     * @access public
     */
    public $removePredefinedValues = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param fieldDefinition $fieldDefinition
     * @param string[] $addPredefinedValues
     * @param string[] $removePredefinedValues
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinition, $addPredefinedValues, $removePredefinedValues)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinition = $fieldDefinition;
      $this->addPredefinedValues = $addPredefinedValues;
      $this->removePredefinedValues = $removePredefinedValues;
    }

}

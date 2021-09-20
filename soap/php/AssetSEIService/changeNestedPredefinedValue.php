<?php

class changeNestedPredefinedValue
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
     * @var string $fieldDefinitionId
     * @access public
     */
    public $fieldDefinitionId = null;

    /**
     * @var string $nestedValueId
     * @access public
     */
    public $nestedValueId = null;

    /**
     * @var string $newValue
     * @access public
     */
    public $newValue = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $fieldDefinitionId
     * @param string $nestedValueId
     * @param string $newValue
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinitionId, $nestedValueId, $newValue)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinitionId = $fieldDefinitionId;
      $this->nestedValueId = $nestedValueId;
      $this->newValue = $newValue;
    }

}

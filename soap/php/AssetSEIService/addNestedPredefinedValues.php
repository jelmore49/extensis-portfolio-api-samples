<?php

class addNestedPredefinedValues
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
     * @var nestedValue[] $newValueList
     * @access public
     */
    public $newValueList = null;

    /**
     * @var string $parentId
     * @access public
     */
    public $parentId = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $fieldDefinitionId
     * @param nestedValue[] $newValueList
     * @param string $parentId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinitionId, $newValueList, $parentId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinitionId = $fieldDefinitionId;
      $this->newValueList = $newValueList;
      $this->parentId = $parentId;
    }

}

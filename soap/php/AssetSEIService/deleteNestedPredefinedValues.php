<?php

class deleteNestedPredefinedValues
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
     * @var string[] $nestedValueIds
     * @access public
     */
    public $nestedValueIds = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $fieldDefinitionId
     * @param string[] $nestedValueIds
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinitionId, $nestedValueIds)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinitionId = $fieldDefinitionId;
      $this->nestedValueIds = $nestedValueIds;
    }

}

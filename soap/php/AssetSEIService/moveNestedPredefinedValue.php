<?php

class moveNestedPredefinedValue
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
     * @var string $newParentId
     * @access public
     */
    public $newParentId = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $fieldDefinitionId
     * @param string $nestedValueId
     * @param string $newParentId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $fieldDefinitionId, $nestedValueId, $newParentId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->fieldDefinitionId = $fieldDefinitionId;
      $this->nestedValueId = $nestedValueId;
      $this->newParentId = $newParentId;
    }

}

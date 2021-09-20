<?php

class fieldValuesChange
{

    /**
     * @var fieldValuesChangeAction $action
     * @access public
     */
    public $action = null;

    /**
     * @var string[] $existingValues
     * @access public
     */
    public $existingValues = null;

    /**
     * @var string $fieldName
     * @access public
     */
    public $fieldName = null;

    /**
     * @var string[] $newValues
     * @access public
     */
    public $newValues = null;

    /**
     * @param fieldValuesChangeAction $action
     * @param string $fieldName
     * @access public
     */
    public function __construct($action, $fieldName)
    {
      $this->action = $action;
      $this->fieldName = $fieldName;
    }

}

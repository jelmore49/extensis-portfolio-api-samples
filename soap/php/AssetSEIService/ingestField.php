<?php

class ingestField
{

    /**
     * @var fieldDefinition $fieldDefinition
     * @access public
     */
    public $fieldDefinition = null;

    /**
     * @var boolean $required
     * @access public
     */
    public $required = null;

    /**
     * @param fieldDefinition $fieldDefinition
     * @param boolean $required
     * @access public
     */
    public function __construct($fieldDefinition, $required)
    {
      $this->fieldDefinition = $fieldDefinition;
      $this->required = $required;
    }

}

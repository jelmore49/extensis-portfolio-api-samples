<?php

class nestedValue
{

    /**
     * @var nestedValue[] $children
     * @access public
     */
    public $children = null;

    /**
     * @var string $id
     * @access public
     */
    public $id = null;

    /**
     * @var string $parentId
     * @access public
     */
    public $parentId = null;

    /**
     * @var string $value
     * @access public
     */
    public $value = null;

    /**
     * @param string $id
     * @param string $parentId
     * @param string $value
     * @access public
     */
    public function __construct($id, $parentId, $value)
    {
      $this->id = $id;
      $this->parentId = $parentId;
      $this->value = $value;
    }

}

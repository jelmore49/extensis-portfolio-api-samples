<?php

class sortOptions
{

    /**
     * @var string $sortFieldName
     * @access public
     */
    public $sortFieldName = null;

    /**
     * @var boolean $sortOrderAscending
     * @access public
     */
    public $sortOrderAscending = null;

    /**
     * @param boolean $sortOrderAscending
     * @access public
     */
    public function __construct($sortOrderAscending)
    {
      $this->sortOrderAscending = $sortOrderAscending;
    }

}

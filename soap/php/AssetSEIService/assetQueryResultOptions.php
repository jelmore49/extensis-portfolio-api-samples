<?php

class assetQueryResultOptions
{

    /**
     * @var string[] $fieldNames
     * @access public
     */
    public $fieldNames = null;

    /**
     * @var int $pageSize
     * @access public
     */
    public $pageSize = null;

    /**
     * @var int $startingIndex
     * @access public
     */
    public $startingIndex = null;

    /**
     * @param int $pageSize
     * @param int $startingIndex
     * @access public
     */
    public function __construct($pageSize, $startingIndex)
    {
      $this->pageSize = $pageSize;
      $this->startingIndex = $startingIndex;
    }

}

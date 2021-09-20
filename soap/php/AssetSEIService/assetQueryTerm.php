<?php

class assetQueryTerm
{

    /**
     * @var string $fieldName
     * @access public
     */
    public $fieldName = null;

    /**
     * @var queryOperator $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var assetQueryTerm[] $subqueries
     * @access public
     */
    public $subqueries = null;

    /**
     * @var string[] $values
     * @access public
     */
    public $values = null;

    /**
     * @access public
     */
    public function __construct()
    {
    
    }

}

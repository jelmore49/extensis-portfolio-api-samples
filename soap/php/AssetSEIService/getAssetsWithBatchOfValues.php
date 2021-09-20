<?php

class getAssetsWithBatchOfValues
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
     * @var assetQuery $restrictionQuery
     * @access public
     */
    public $restrictionQuery = null;

    /**
     * @var assetQuery $matchingValuesQuery
     * @access public
     */
    public $matchingValuesQuery = null;

    /**
     * @var assetQueryResultOptions $resultOptions
     * @access public
     */
    public $resultOptions = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param assetQuery $restrictionQuery
     * @param assetQuery $matchingValuesQuery
     * @param assetQueryResultOptions $resultOptions
     * @access public
     */
    public function __construct($sessionId, $catalogId, $restrictionQuery, $matchingValuesQuery, $resultOptions)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->restrictionQuery = $restrictionQuery;
      $this->matchingValuesQuery = $matchingValuesQuery;
      $this->resultOptions = $resultOptions;
    }

}

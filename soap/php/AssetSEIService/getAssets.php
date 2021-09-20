<?php

class getAssets
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
     * @var assetQuery $assets
     * @access public
     */
    public $assets = null;

    /**
     * @var assetQueryResultOptions $resultOptions
     * @access public
     */
    public $resultOptions = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param assetQuery $assets
     * @param assetQueryResultOptions $resultOptions
     * @access public
     */
    public function __construct($sessionId, $catalogId, $assets, $resultOptions)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->assets = $assets;
      $this->resultOptions = $resultOptions;
    }

}

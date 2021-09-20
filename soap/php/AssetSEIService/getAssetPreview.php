<?php

class getAssetPreview
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
     * @var int $pageNumber
     * @access public
     */
    public $pageNumber = null;

    /**
     * @var string $assetId
     * @access public
     */
    public $assetId = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param int $pageNumber
     * @param string $assetId
     * @access public
     */
    public function __construct($sessionId, $catalogId, $pageNumber, $assetId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->pageNumber = $pageNumber;
      $this->assetId = $assetId;
    }

}

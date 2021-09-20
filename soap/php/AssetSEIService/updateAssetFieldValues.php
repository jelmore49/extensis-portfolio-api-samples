<?php

class updateAssetFieldValues
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
     * @var fieldValuesChange[] $changes
     * @access public
     */
    public $changes = null;

    /**
     * @var boolean $embedChangesInOriginal
     * @access public
     */
    public $embedChangesInOriginal = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param assetQuery $assets
     * @param boolean $embedChangesInOriginal
     * @access public
     */
    public function __construct($sessionId, $catalogId, $assets, $embedChangesInOriginal)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->assets = $assets;
      $this->embedChangesInOriginal = $embedChangesInOriginal;
    }

}

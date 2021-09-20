<?php

class asset
{

    /**
     * @var string $assetId
     * @access public
     */
    public $assetId = null;

    /**
     * @var multiValuedAttribute[] $attributes
     * @access public
     */
    public $attributes = null;

    /**
     * @param string $assetId
     * @access public
     */
    public function __construct($assetId)
    {
      $this->assetId = $assetId;
    }

}

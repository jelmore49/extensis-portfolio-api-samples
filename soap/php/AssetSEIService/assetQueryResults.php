<?php

class assetQueryResults
{

    /**
     * @var asset[] $assets
     * @access public
     */
    public $assets = null;

    /**
     * @var string $queryCacheId
     * @access public
     */
    public $queryCacheId = null;

    /**
     * @var int $totalNumberOfAssets
     * @access public
     */
    public $totalNumberOfAssets = null;

    /**
     * @param int $totalNumberOfAssets
     * @access public
     */
    public function __construct($totalNumberOfAssets)
    {
      $this->totalNumberOfAssets = $totalNumberOfAssets;
    }

}

<?php

class runJob
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
     * @var job $job
     * @access public
     */
    public $job = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param assetQuery $assets
     * @param job $job
     * @access public
     */
    public function __construct($sessionId, $catalogId, $assets, $job)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->assets = $assets;
      $this->job = $job;
    }

}

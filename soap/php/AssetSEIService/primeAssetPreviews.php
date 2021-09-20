<?php

class primeAssetPreviews
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
     * @var long[] $rids
     * @access public
     */
    public $rids = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @access public
     */
    public function __construct($sessionId, $catalogId)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
    }

}

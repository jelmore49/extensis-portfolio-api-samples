<?php

class getExclusionInfoForCatalog
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

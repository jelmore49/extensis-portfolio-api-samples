<?php

class getUnmatchedFieldValuesFromBatchFind
{

    /**
     * @var string $sessionId
     * @access public
     */
    public $sessionId = null;

    /**
     * @var string $queryCacheId
     * @access public
     */
    public $queryCacheId = null;

    /**
     * @param string $sessionId
     * @param string $queryCacheId
     * @access public
     */
    public function __construct($sessionId, $queryCacheId)
    {
      $this->sessionId = $sessionId;
      $this->queryCacheId = $queryCacheId;
    }

}

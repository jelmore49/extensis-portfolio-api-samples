<?php

class completion
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
     * @var string $completionTerm
     * @access public
     */
    public $completionTerm = null;

    /**
     * @param string $sessionId
     * @param string $catalogId
     * @param string $completionTerm
     * @access public
     */
    public function __construct($sessionId, $catalogId, $completionTerm)
    {
      $this->sessionId = $sessionId;
      $this->catalogId = $catalogId;
      $this->completionTerm = $completionTerm;
    }

}

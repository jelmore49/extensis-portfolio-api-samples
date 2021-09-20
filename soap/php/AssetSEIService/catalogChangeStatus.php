<?php

class catalogChangeStatus
{

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var attribute[] $cn
     * @access public
     */
    public $cn = null;

    /**
     * @param string $catalogId
     * @access public
     */
    public function __construct($catalogId)
    {
      $this->catalogId = $catalogId;
    }

}

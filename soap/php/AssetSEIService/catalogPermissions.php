<?php

class catalogPermissions
{

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var userPermission[] $enabledPermissions
     * @access public
     */
    public $enabledPermissions = null;

    /**
     * @param string $catalogId
     * @access public
     */
    public function __construct($catalogId)
    {
      $this->catalogId = $catalogId;
    }

}

<?php

class catalog
{

    /**
     * @var string $catalogId
     * @access public
     */
    public $catalogId = null;

    /**
     * @var attribute[] $details
     * @access public
     */
    public $details = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var boolean $wereUsersImported
     * @access public
     */
    public $wereUsersImported = null;

    /**
     * @param string $catalogId
     * @param string $name
     * @param boolean $wereUsersImported
     * @access public
     */
    public function __construct($catalogId, $name, $wereUsersImported)
    {
      $this->catalogId = $catalogId;
      $this->name = $name;
      $this->wereUsersImported = $wereUsersImported;
    }

}

<?php

class gallery
{

    /**
     * @var galleryAccessType $accessType
     * @access public
     */
    public $accessType = null;

    /**
     * @var string $galleryId
     * @access public
     */
    public $galleryId = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var string $owner
     * @access public
     */
    public $owner = null;

    /**
     * @var assetQueryTerm $savedFind
     * @access public
     */
    public $savedFind = null;

    /**
     * @var galleryType $type
     * @access public
     */
    public $type = null;

    /**
     * @param galleryAccessType $accessType
     * @param string $galleryId
     * @param string $name
     * @param string $owner
     * @param galleryType $type
     * @access public
     */
    public function __construct($accessType, $galleryId, $name, $owner, $type)
    {
      $this->accessType = $accessType;
      $this->galleryId = $galleryId;
      $this->name = $name;
      $this->owner = $owner;
      $this->type = $type;
    }

}

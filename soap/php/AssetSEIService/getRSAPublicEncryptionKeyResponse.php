<?php

class getRSAPublicEncryptionKeyResponse
{

    /**
     * @var keySpecification $return
     * @access public
     */
    public $return = null;

    /**
     * @param keySpecification $return
     * @access public
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

}

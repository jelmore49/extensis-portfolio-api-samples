<?php

class login
{

    /**
     * @var string $userName
     * @access public
     */
    public $userName = null;

    /**
     * @var string $encryptedPassword
     * @access public
     */
    public $encryptedPassword = null;

    /**
     * @param string $userName
     * @param string $encryptedPassword
     * @access public
     */
    public function __construct($userName, $encryptedPassword)
    {
      $this->userName = $userName;
      $this->encryptedPassword = $encryptedPassword;
    }

}

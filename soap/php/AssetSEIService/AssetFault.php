<?php

class AssetFault
{

    /**
     * @var string $details
     * @access public
     */
    public $details = null;

    /**
     * @var faultCode $faultCode
     * @access public
     */
    public $faultCode = null;

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @param string $details
     * @param faultCode $faultCode
     * @param string $message
     * @access public
     */
    public function __construct($details, $faultCode, $message)
    {
      $this->details = $details;
      $this->faultCode = $faultCode;
      $this->message = $message;
    }

}

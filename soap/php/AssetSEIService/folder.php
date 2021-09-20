<?php

class folder
{

    /**
     * @var folder[] $s
     * @access public
     */
    public $s = null;

    /**
     * @var int $f
     * @access public
     */
    public $f = null;

    /**
     * @var int $m
     * @access public
     */
    public $m = null;

    /**
     * @var string $n
     * @access public
     */
    public $n = null;

    /**
     * @param int $f
     * @param int $m
     * @param string $n
     * @access public
     */
    public function __construct($f, $m, $n)
    {
      $this->f = $f;
      $this->m = $m;
      $this->n = $n;
    }

}

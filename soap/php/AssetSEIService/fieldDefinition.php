<?php

class fieldDefinition
{

    /**
     * @var string[] $defaultValues
     * @access public
     */
    public $defaultValues = null;

    /**
     * @var boolean $embeddable
     * @access public
     */
    public $embeddable = null;

    /**
     * @var boolean $hasPredefinedValues
     * @access public
     */
    public $hasPredefinedValues = null;

    /**
     * @var boolean $hierarchical
     * @access public
     */
    public $hierarchical = null;

    /**
     * @var string $id
     * @access public
     */
    public $id = null;

    /**
     * @var string $internalName
     * @access public
     */
    public $internalName = null;

    /**
     * @var attribute[] $localizedNames
     * @access public
     */
    public $localizedNames = null;

    /**
     * @var int $maxLength
     * @access public
     */
    public $maxLength = null;

    /**
     * @var boolean $multivalued
     * @access public
     */
    public $multivalued = null;

    /**
     * @var nestedValue[] $nestedPredefinedValues
     * @access public
     */
    public $nestedPredefinedValues = null;

    /**
     * @var int $precision
     * @access public
     */
    public $precision = null;

    /**
     * @var string[] $predefinedValues
     * @access public
     */
    public $predefinedValues = null;

    /**
     * @var boolean $searchable
     * @access public
     */
    public $searchable = null;

    /**
     * @var boolean $showTime
     * @access public
     */
    public $showTime = null;

    /**
     * @var boolean $sortable
     * @access public
     */
    public $sortable = null;

    /**
     * @var string $systemName
     * @access public
     */
    public $systemName = null;

    /**
     * @var int $type
     * @access public
     */
    public $type = null;

    /**
     * @var boolean $usePredefinedOnly
     * @access public
     */
    public $usePredefinedOnly = null;

    /**
     * @param boolean $embeddable
     * @param boolean $hasPredefinedValues
     * @param boolean $hierarchical
     * @param string $id
     * @param string $internalName
     * @param int $maxLength
     * @param boolean $multivalued
     * @param int $precision
     * @param boolean $searchable
     * @param boolean $showTime
     * @param boolean $sortable
     * @param string $systemName
     * @param int $type
     * @param boolean $usePredefinedOnly
     * @access public
     */
    public function __construct($embeddable, $hasPredefinedValues, $hierarchical, $id, $internalName, $maxLength, $multivalued, $precision, $searchable, $showTime, $sortable, $systemName, $type, $usePredefinedOnly)
    {
      $this->embeddable = $embeddable;
      $this->hasPredefinedValues = $hasPredefinedValues;
      $this->hierarchical = $hierarchical;
      $this->id = $id;
      $this->internalName = $internalName;
      $this->maxLength = $maxLength;
      $this->multivalued = $multivalued;
      $this->precision = $precision;
      $this->searchable = $searchable;
      $this->showTime = $showTime;
      $this->sortable = $sortable;
      $this->systemName = $systemName;
      $this->type = $type;
      $this->usePredefinedOnly = $usePredefinedOnly;
    }

}

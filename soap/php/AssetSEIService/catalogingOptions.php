<?php

class catalogingOptions
{

    /**
     * @var boolean $extractMetadata
     * @access public
     */
    public $extractMetadata = null;

    /**
     * @var boolean $indexDocumentText
     * @access public
     */
    public $indexDocumentText = null;

    /**
     * @var int $keywordsFromPathStyle
     * @access public
     */
    public $keywordsFromPathStyle = null;

    /**
     * @var string $language
     * @access public
     */
    public $language = null;

    /**
     * @var boolean $parseKeywords
     * @access public
     */
    public $parseKeywords = null;

    /**
     * @var int $thumbnailSize
     * @access public
     */
    public $thumbnailSize = null;

    /**
     * @var boolean $useConstrainedIngest
     * @access public
     */
    public $useConstrainedIngest = null;

    /**
     * @param boolean $extractMetadata
     * @param boolean $indexDocumentText
     * @param int $keywordsFromPathStyle
     * @param string $language
     * @param boolean $parseKeywords
     * @param int $thumbnailSize
     * @param boolean $useConstrainedIngest
     * @access public
     */
    public function __construct($extractMetadata, $indexDocumentText, $keywordsFromPathStyle, $language, $parseKeywords, $thumbnailSize, $useConstrainedIngest)
    {
      $this->extractMetadata = $extractMetadata;
      $this->indexDocumentText = $indexDocumentText;
      $this->keywordsFromPathStyle = $keywordsFromPathStyle;
      $this->language = $language;
      $this->parseKeywords = $parseKeywords;
      $this->thumbnailSize = $thumbnailSize;
      $this->useConstrainedIngest = $useConstrainedIngest;
    }

}

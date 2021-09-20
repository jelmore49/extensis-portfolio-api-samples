<?php

include_once('createTaskPreset.php');
include_once('task.php');
include_once('attribute.php');
include_once('createTaskPresetResponse.php');
include_once('AssetFault.php');
include_once('login.php');
include_once('loginResponse.php');
include_once('addNestedPredefinedValues.php');
include_once('nestedValue.php');
include_once('addNestedPredefinedValuesResponse.php');
include_once('getCatalogChangeStatus.php');
include_once('getCatalogChangeStatusResponse.php');
include_once('catalogChangeStatus.php');
include_once('runJob.php');
include_once('assetQuery.php');
include_once('assetQueryTerm.php');
include_once('sortOptions.php');
include_once('job.php');
include_once('semaphore.php');
include_once('runJobResponse.php');
include_once('moveSubfolder.php');
include_once('moveSubfolderResponse.php');
include_once('getServerFeatures.php');
include_once('getServerFeaturesResponse.php');
include_once('getAssetsWithBatchOfValues.php');
include_once('assetQueryResultOptions.php');
include_once('getAssetsWithBatchOfValuesResponse.php');
include_once('assetQueryResults.php');
include_once('asset.php');
include_once('multiValuedAttribute.php');
include_once('uploadFile.php');
include_once('uploadFileResponse.php');
include_once('updateTaskPreset.php');
include_once('updateTaskPresetResponse.php');
include_once('removeItemsFromGallery.php');
include_once('removeItemsFromGalleryResponse.php');
include_once('setPredefinedValues.php');
include_once('fieldDefinition.php');
include_once('setPredefinedValuesResponse.php');
include_once('updateAssetFieldValues.php');
include_once('fieldValuesChange.php');
include_once('updateAssetFieldValuesResponse.php');
include_once('getAssetPreview.php');
include_once('getAssetPreviewResponse.php');
include_once('updateGallery.php');
include_once('gallery.php');
include_once('updateGalleryResponse.php');
include_once('getWatchFolders.php');
include_once('getWatchFoldersResponse.php');
include_once('watchFolder.php');
include_once('setDefaultViewSettings.php');
include_once('setDefaultViewSettingsResponse.php');
include_once('completion.php');
include_once('completionResponse.php');
include_once('getAutomationScripts.php');
include_once('getAutomationScriptsResponse.php');
include_once('deleteNestedPredefinedValues.php');
include_once('deleteNestedPredefinedValuesResponse.php');
include_once('getIngestConfig.php');
include_once('getIngestConfigResponse.php');
include_once('ingestConfig.php');
include_once('ingestField.php');
include_once('listAddToCatalog.php');
include_once('listAddToCatalogResponse.php');
include_once('getJobIDs.php');
include_once('getJobIDsResponse.php');
include_once('getStatusForJobs.php');
include_once('getStatusForJobsResponse.php');
include_once('jobStatus.php');
include_once('getGalleries.php');
include_once('getGalleriesResponse.php');
include_once('getVideoExtensions.php');
include_once('getVideoExtensionsResponse.php');
include_once('listOutputFileFormat.php');
include_once('listOutputFileFormatResponse.php');
include_once('setUserViewSettings.php');
include_once('setUserViewSettingsResponse.php');
include_once('getCatalogs.php');
include_once('getCatalogsResponse.php');
include_once('catalog.php');
include_once('synchronizeFolder.php');
include_once('synchronizeFolderResponse.php');
include_once('createGallery.php');
include_once('createGalleryResponse.php');
include_once('removeAssetsFromCatalog.php');
include_once('removeAssetsFromCatalogResponse.php');
include_once('listDngJpegPreviewType.php');
include_once('listDngJpegPreviewTypeResponse.php');
include_once('listCompressionType.php');
include_once('listCompressionTypeResponse.php');
include_once('addOrRemovePredefinedValues.php');
include_once('addOrRemovePredefinedValuesResponse.php');
include_once('updateWatchFolder.php');
include_once('updateWatchFolderResponse.php');
include_once('getRSAPublicEncryptionKey.php');
include_once('getRSAPublicEncryptionKeyResponse.php');
include_once('keySpecification.php');
include_once('createSubfolder.php');
include_once('createSubfolderResponse.php');
include_once('getErrorDetailsForJob.php');
include_once('getErrorDetailsForJobResponse.php');
include_once('getUserPreferences.php');
include_once('getUserPreferencesResponse.php');
include_once('deleteTask.php');
include_once('deleteTaskResponse.php');
include_once('listTaskSettings.php');
include_once('listTaskSettingsResponse.php');
include_once('getDefaultViewSettings.php');
include_once('getDefaultViewSettingsResponse.php');
include_once('listWatermarkPosition.php');
include_once('listWatermarkPositionResponse.php');
include_once('getTaskPresets.php');
include_once('getTaskPresetsResponse.php');
include_once('getServerFolderNames.php');
include_once('getServerFolderNamesResponse.php');
include_once('cancelJob.php');
include_once('cancelJobResponse.php');
include_once('getWatchFolder.php');
include_once('getWatchFolderResponse.php');
include_once('listOutputDestination.php');
include_once('listOutputDestinationResponse.php');
include_once('getAudioExtensions.php');
include_once('getAudioExtensionsResponse.php');
include_once('getServerSystemInformation.php');
include_once('getServerSystemInformationResponse.php');
include_once('getDetailsForWatchFolder.php');
include_once('getDetailsForWatchFolderResponse.php');
include_once('removeWatchFolder.php');
include_once('removeWatchFolderResponse.php');
include_once('changeNestedPredefinedValue.php');
include_once('changeNestedPredefinedValueResponse.php');
include_once('getAssets.php');
include_once('getAssetsResponse.php');
include_once('getUnmatchedFieldValuesFromBatchFind.php');
include_once('getUnmatchedFieldValuesFromBatchFindResponse.php');
include_once('getCatalogPermissions.php');
include_once('getCatalogPermissionsResponse.php');
include_once('catalogPermissions.php');
include_once('deleteGallery.php');
include_once('deleteGalleryResponse.php');
include_once('getFieldDefinitions.php');
include_once('getFieldDefinitionsResponse.php');
include_once('getUserViewSettings.php');
include_once('getUserViewSettingsResponse.php');
include_once('listRenameType.php');
include_once('listRenameTypeResponse.php');
include_once('listDNGEmbedRawFile.php');
include_once('listDNGEmbedRawFileResponse.php');
include_once('listDngCameraRawVersion.php');
include_once('listDngCameraRawVersionResponse.php');
include_once('listResizeType.php');
include_once('listResizeTypeResponse.php');
include_once('moveNestedPredefinedValue.php');
include_once('moveNestedPredefinedValueResponse.php');
include_once('getCatalogingOptions.php');
include_once('getCatalogingOptionsResponse.php');
include_once('catalogingOptions.php');
include_once('primeAssetPreviews.php');
include_once('primeAssetPreviewsResponse.php');
include_once('logout.php');
include_once('logoutResponse.php');
include_once('addItemsToGallery.php');
include_once('addItemsToGalleryResponse.php');
include_once('listColorMode.php');
include_once('listColorModeResponse.php');
include_once('listUnit.php');
include_once('listUnitResponse.php');
include_once('getFolderTreeForWatchFolder.php');
include_once('getFolderTreeForWatchFolderResponse.php');
include_once('folder.php');
include_once('setUserPreferences.php');
include_once('setUserPreferencesResponse.php');
include_once('getExclusionInfoForCatalog.php');
include_once('getExclusionInfoForCatalogResponse.php');
include_once('exclusionInfo.php');
include_once('addAssetsByPath.php');
include_once('addAssetsByPathResponse.php');
include_once('addWatchFolder.php');
include_once('addWatchFolderResponse.php');
include_once('deleteSubfolder.php');
include_once('deleteSubfolderResponse.php');
include_once('setSessionInactivityTimeout.php');
include_once('setSessionInactivityTimeoutResponse.php');
include_once('listWatermarkType.php');
include_once('listWatermarkTypeResponse.php');
include_once('taskType.php');
include_once('faultCode.php');
include_once('queryOperator.php');
include_once('locale.php');
include_once('sourceImage.php');
include_once('fieldValuesChangeAction.php');
include_once('galleryAccessType.php');
include_once('galleryType.php');
include_once('syncOptions.php');
include_once('addToCatalog.php');
include_once('jobStatusType.php');
include_once('outputFileFormat.php');
include_once('dngJpegPreviewType.php');
include_once('compressionType.php');
include_once('taskSetting.php');
include_once('watermarkPosition.php');
include_once('outputDestination.php');
include_once('userPermission.php');
include_once('renameType.php');
include_once('dngEmbedRawFile.php');
include_once('dngCameraRawVersion.php');
include_once('resizeType.php');
include_once('colorMode.php');
include_once('unit.php');
include_once('watermarkType.php');

class AssetSEIService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
      'createTaskPreset' => '\createTaskPreset',
      'task' => '\task',
      'attribute' => '\attribute',
      'createTaskPresetResponse' => '\createTaskPresetResponse',
      'AssetFault' => '\AssetFault',
      'login' => '\login',
      'loginResponse' => '\loginResponse',
      'addNestedPredefinedValues' => '\addNestedPredefinedValues',
      'nestedValue' => '\nestedValue',
      'addNestedPredefinedValuesResponse' => '\addNestedPredefinedValuesResponse',
      'getCatalogChangeStatus' => '\getCatalogChangeStatus',
      'getCatalogChangeStatusResponse' => '\getCatalogChangeStatusResponse',
      'catalogChangeStatus' => '\catalogChangeStatus',
      'runJob' => '\runJob',
      'assetQuery' => '\assetQuery',
      'assetQueryTerm' => '\assetQueryTerm',
      'sortOptions' => '\sortOptions',
      'job' => '\job',
      'semaphore' => '\semaphore',
      'runJobResponse' => '\runJobResponse',
      'moveSubfolder' => '\moveSubfolder',
      'moveSubfolderResponse' => '\moveSubfolderResponse',
      'getServerFeatures' => '\getServerFeatures',
      'getServerFeaturesResponse' => '\getServerFeaturesResponse',
      'getAssetsWithBatchOfValues' => '\getAssetsWithBatchOfValues',
      'assetQueryResultOptions' => '\assetQueryResultOptions',
      'getAssetsWithBatchOfValuesResponse' => '\getAssetsWithBatchOfValuesResponse',
      'assetQueryResults' => '\assetQueryResults',
      'asset' => '\asset',
      'multiValuedAttribute' => '\multiValuedAttribute',
      'uploadFile' => '\uploadFile',
      'uploadFileResponse' => '\uploadFileResponse',
      'updateTaskPreset' => '\updateTaskPreset',
      'updateTaskPresetResponse' => '\updateTaskPresetResponse',
      'removeItemsFromGallery' => '\removeItemsFromGallery',
      'removeItemsFromGalleryResponse' => '\removeItemsFromGalleryResponse',
      'setPredefinedValues' => '\setPredefinedValues',
      'fieldDefinition' => '\fieldDefinition',
      'setPredefinedValuesResponse' => '\setPredefinedValuesResponse',
      'updateAssetFieldValues' => '\updateAssetFieldValues',
      'fieldValuesChange' => '\fieldValuesChange',
      'updateAssetFieldValuesResponse' => '\updateAssetFieldValuesResponse',
      'getAssetPreview' => '\getAssetPreview',
      'getAssetPreviewResponse' => '\getAssetPreviewResponse',
      'updateGallery' => '\updateGallery',
      'gallery' => '\gallery',
      'updateGalleryResponse' => '\updateGalleryResponse',
      'getWatchFolders' => '\getWatchFolders',
      'getWatchFoldersResponse' => '\getWatchFoldersResponse',
      'watchFolder' => '\watchFolder',
      'setDefaultViewSettings' => '\setDefaultViewSettings',
      'setDefaultViewSettingsResponse' => '\setDefaultViewSettingsResponse',
      'completion' => '\completion',
      'completionResponse' => '\completionResponse',
      'getAutomationScripts' => '\getAutomationScripts',
      'getAutomationScriptsResponse' => '\getAutomationScriptsResponse',
      'deleteNestedPredefinedValues' => '\deleteNestedPredefinedValues',
      'deleteNestedPredefinedValuesResponse' => '\deleteNestedPredefinedValuesResponse',
      'getIngestConfig' => '\getIngestConfig',
      'getIngestConfigResponse' => '\getIngestConfigResponse',
      'ingestConfig' => '\ingestConfig',
      'ingestField' => '\ingestField',
      'listAddToCatalog' => '\listAddToCatalog',
      'listAddToCatalogResponse' => '\listAddToCatalogResponse',
      'getJobIDs' => '\getJobIDs',
      'getJobIDsResponse' => '\getJobIDsResponse',
      'getStatusForJobs' => '\getStatusForJobs',
      'getStatusForJobsResponse' => '\getStatusForJobsResponse',
      'jobStatus' => '\jobStatus',
      'getGalleries' => '\getGalleries',
      'getGalleriesResponse' => '\getGalleriesResponse',
      'getVideoExtensions' => '\getVideoExtensions',
      'getVideoExtensionsResponse' => '\getVideoExtensionsResponse',
      'listOutputFileFormat' => '\listOutputFileFormat',
      'listOutputFileFormatResponse' => '\listOutputFileFormatResponse',
      'setUserViewSettings' => '\setUserViewSettings',
      'setUserViewSettingsResponse' => '\setUserViewSettingsResponse',
      'getCatalogs' => '\getCatalogs',
      'getCatalogsResponse' => '\getCatalogsResponse',
      'catalog' => '\catalog',
      'synchronizeFolder' => '\synchronizeFolder',
      'synchronizeFolderResponse' => '\synchronizeFolderResponse',
      'createGallery' => '\createGallery',
      'createGalleryResponse' => '\createGalleryResponse',
      'removeAssetsFromCatalog' => '\removeAssetsFromCatalog',
      'removeAssetsFromCatalogResponse' => '\removeAssetsFromCatalogResponse',
      'listDngJpegPreviewType' => '\listDngJpegPreviewType',
      'listDngJpegPreviewTypeResponse' => '\listDngJpegPreviewTypeResponse',
      'listCompressionType' => '\listCompressionType',
      'listCompressionTypeResponse' => '\listCompressionTypeResponse',
      'addOrRemovePredefinedValues' => '\addOrRemovePredefinedValues',
      'addOrRemovePredefinedValuesResponse' => '\addOrRemovePredefinedValuesResponse',
      'updateWatchFolder' => '\updateWatchFolder',
      'updateWatchFolderResponse' => '\updateWatchFolderResponse',
      'getRSAPublicEncryptionKey' => '\getRSAPublicEncryptionKey',
      'getRSAPublicEncryptionKeyResponse' => '\getRSAPublicEncryptionKeyResponse',
      'keySpecification' => '\keySpecification',
      'createSubfolder' => '\createSubfolder',
      'createSubfolderResponse' => '\createSubfolderResponse',
      'getErrorDetailsForJob' => '\getErrorDetailsForJob',
      'getErrorDetailsForJobResponse' => '\getErrorDetailsForJobResponse',
      'getUserPreferences' => '\getUserPreferences',
      'getUserPreferencesResponse' => '\getUserPreferencesResponse',
      'deleteTask' => '\deleteTask',
      'deleteTaskResponse' => '\deleteTaskResponse',
      'listTaskSettings' => '\listTaskSettings',
      'listTaskSettingsResponse' => '\listTaskSettingsResponse',
      'getDefaultViewSettings' => '\getDefaultViewSettings',
      'getDefaultViewSettingsResponse' => '\getDefaultViewSettingsResponse',
      'listWatermarkPosition' => '\listWatermarkPosition',
      'listWatermarkPositionResponse' => '\listWatermarkPositionResponse',
      'getTaskPresets' => '\getTaskPresets',
      'getTaskPresetsResponse' => '\getTaskPresetsResponse',
      'getServerFolderNames' => '\getServerFolderNames',
      'getServerFolderNamesResponse' => '\getServerFolderNamesResponse',
      'cancelJob' => '\cancelJob',
      'cancelJobResponse' => '\cancelJobResponse',
      'getWatchFolder' => '\getWatchFolder',
      'getWatchFolderResponse' => '\getWatchFolderResponse',
      'listOutputDestination' => '\listOutputDestination',
      'listOutputDestinationResponse' => '\listOutputDestinationResponse',
      'getAudioExtensions' => '\getAudioExtensions',
      'getAudioExtensionsResponse' => '\getAudioExtensionsResponse',
      'getServerSystemInformation' => '\getServerSystemInformation',
      'getServerSystemInformationResponse' => '\getServerSystemInformationResponse',
      'getDetailsForWatchFolder' => '\getDetailsForWatchFolder',
      'getDetailsForWatchFolderResponse' => '\getDetailsForWatchFolderResponse',
      'removeWatchFolder' => '\removeWatchFolder',
      'removeWatchFolderResponse' => '\removeWatchFolderResponse',
      'changeNestedPredefinedValue' => '\changeNestedPredefinedValue',
      'changeNestedPredefinedValueResponse' => '\changeNestedPredefinedValueResponse',
      'getAssets' => '\getAssets',
      'getAssetsResponse' => '\getAssetsResponse',
      'getUnmatchedFieldValuesFromBatchFind' => '\getUnmatchedFieldValuesFromBatchFind',
      'getUnmatchedFieldValuesFromBatchFindResponse' => '\getUnmatchedFieldValuesFromBatchFindResponse',
      'getCatalogPermissions' => '\getCatalogPermissions',
      'getCatalogPermissionsResponse' => '\getCatalogPermissionsResponse',
      'catalogPermissions' => '\catalogPermissions',
      'deleteGallery' => '\deleteGallery',
      'deleteGalleryResponse' => '\deleteGalleryResponse',
      'getFieldDefinitions' => '\getFieldDefinitions',
      'getFieldDefinitionsResponse' => '\getFieldDefinitionsResponse',
      'getUserViewSettings' => '\getUserViewSettings',
      'getUserViewSettingsResponse' => '\getUserViewSettingsResponse',
      'listRenameType' => '\listRenameType',
      'listRenameTypeResponse' => '\listRenameTypeResponse',
      'listDNGEmbedRawFile' => '\listDNGEmbedRawFile',
      'listDNGEmbedRawFileResponse' => '\listDNGEmbedRawFileResponse',
      'listDngCameraRawVersion' => '\listDngCameraRawVersion',
      'listDngCameraRawVersionResponse' => '\listDngCameraRawVersionResponse',
      'listResizeType' => '\listResizeType',
      'listResizeTypeResponse' => '\listResizeTypeResponse',
      'moveNestedPredefinedValue' => '\moveNestedPredefinedValue',
      'moveNestedPredefinedValueResponse' => '\moveNestedPredefinedValueResponse',
      'getCatalogingOptions' => '\getCatalogingOptions',
      'getCatalogingOptionsResponse' => '\getCatalogingOptionsResponse',
      'catalogingOptions' => '\catalogingOptions',
      'primeAssetPreviews' => '\primeAssetPreviews',
      'primeAssetPreviewsResponse' => '\primeAssetPreviewsResponse',
      'logout' => '\logout',
      'logoutResponse' => '\logoutResponse',
      'addItemsToGallery' => '\addItemsToGallery',
      'addItemsToGalleryResponse' => '\addItemsToGalleryResponse',
      'listColorMode' => '\listColorMode',
      'listColorModeResponse' => '\listColorModeResponse',
      'listUnit' => '\listUnit',
      'listUnitResponse' => '\listUnitResponse',
      'getFolderTreeForWatchFolder' => '\getFolderTreeForWatchFolder',
      'getFolderTreeForWatchFolderResponse' => '\getFolderTreeForWatchFolderResponse',
      'folder' => '\folder',
      'setUserPreferences' => '\setUserPreferences',
      'setUserPreferencesResponse' => '\setUserPreferencesResponse',
      'getExclusionInfoForCatalog' => '\getExclusionInfoForCatalog',
      'getExclusionInfoForCatalogResponse' => '\getExclusionInfoForCatalogResponse',
      'exclusionInfo' => '\exclusionInfo',
      'addAssetsByPath' => '\addAssetsByPath',
      'addAssetsByPathResponse' => '\addAssetsByPathResponse',
      'addWatchFolder' => '\addWatchFolder',
      'addWatchFolderResponse' => '\addWatchFolderResponse',
      'deleteSubfolder' => '\deleteSubfolder',
      'deleteSubfolderResponse' => '\deleteSubfolderResponse',
      'setSessionInactivityTimeout' => '\setSessionInactivityTimeout',
      'setSessionInactivityTimeoutResponse' => '\setSessionInactivityTimeoutResponse',
      'listWatermarkType' => '\listWatermarkType',
      'listWatermarkTypeResponse' => '\listWatermarkTypeResponse');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $wsdl = 'AssetSEIService.wsdl')
    {
      foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
  
  parent::__construct($wsdl, $options);
    }

    /**
     * @param login $parameters
     * @access public
     * @return loginResponse
     */
    public function login(login $parameters)
    {
      return $this->__soapCall('login', array($parameters));
    }

    /**
     * @param updateGallery $parameters
     * @access public
     * @return updateGalleryResponse
     */
    public function updateGallery(updateGallery $parameters)
    {
      return $this->__soapCall('updateGallery', array($parameters));
    }

    /**
     * @param deleteGallery $parameters
     * @access public
     * @return deleteGalleryResponse
     */
    public function deleteGallery(deleteGallery $parameters)
    {
      return $this->__soapCall('deleteGallery', array($parameters));
    }

    /**
     * @param getCatalogs $parameters
     * @access public
     * @return getCatalogsResponse
     */
    public function getCatalogs(getCatalogs $parameters)
    {
      return $this->__soapCall('getCatalogs', array($parameters));
    }

    /**
     * @param deleteTask $parameters
     * @access public
     * @return deleteTaskResponse
     */
    public function deleteTask(deleteTask $parameters)
    {
      return $this->__soapCall('deleteTask', array($parameters));
    }

    /**
     * @param getGalleries $parameters
     * @access public
     * @return getGalleriesResponse
     */
    public function getGalleries(getGalleries $parameters)
    {
      return $this->__soapCall('getGalleries', array($parameters));
    }

    /**
     * @param getAssets $parameters
     * @access public
     * @return getAssetsResponse
     */
    public function getAssets(getAssets $parameters)
    {
      return $this->__soapCall('getAssets', array($parameters));
    }

    /**
     * @param getDetailsForWatchFolder $parameters
     * @access public
     * @return getDetailsForWatchFolderResponse
     */
    public function getDetailsForWatchFolder(getDetailsForWatchFolder $parameters)
    {
      return $this->__soapCall('getDetailsForWatchFolder', array($parameters));
    }

    /**
     * @param getAssetsWithBatchOfValues $parameters
     * @access public
     * @return getAssetsWithBatchOfValuesResponse
     */
    public function getAssetsWithBatchOfValues(getAssetsWithBatchOfValues $parameters)
    {
      return $this->__soapCall('getAssetsWithBatchOfValues', array($parameters));
    }

    /**
     * @param createTaskPreset $parameters
     * @access public
     * @return createTaskPresetResponse
     */
    public function createTaskPreset(createTaskPreset $parameters)
    {
      return $this->__soapCall('createTaskPreset', array($parameters));
    }

    /**
     * @param getTaskPresets $parameters
     * @access public
     * @return getTaskPresetsResponse
     */
    public function getTaskPresets(getTaskPresets $parameters)
    {
      return $this->__soapCall('getTaskPresets', array($parameters));
    }

    /**
     * @param updateTaskPreset $parameters
     * @access public
     * @return updateTaskPresetResponse
     */
    public function updateTaskPreset(updateTaskPreset $parameters)
    {
      return $this->__soapCall('updateTaskPreset', array($parameters));
    }

    /**
     * @param getServerFeatures $parameters
     * @access public
     * @return getServerFeaturesResponse
     */
    public function getServerFeatures(getServerFeatures $parameters)
    {
      return $this->__soapCall('getServerFeatures', array($parameters));
    }

    /**
     * @param getUserViewSettings $parameters
     * @access public
     * @return getUserViewSettingsResponse
     */
    public function getUserViewSettings(getUserViewSettings $parameters)
    {
      return $this->__soapCall('getUserViewSettings', array($parameters));
    }

    /**
     * @param getDefaultViewSettings $parameters
     * @access public
     * @return getDefaultViewSettingsResponse
     */
    public function getDefaultViewSettings(getDefaultViewSettings $parameters)
    {
      return $this->__soapCall('getDefaultViewSettings', array($parameters));
    }

    /**
     * @param setUserViewSettings $parameters
     * @access public
     * @return setUserViewSettingsResponse
     */
    public function setUserViewSettings(setUserViewSettings $parameters)
    {
      return $this->__soapCall('setUserViewSettings', array($parameters));
    }

    /**
     * @param setDefaultViewSettings $parameters
     * @access public
     * @return setDefaultViewSettingsResponse
     */
    public function setDefaultViewSettings(setDefaultViewSettings $parameters)
    {
      return $this->__soapCall('setDefaultViewSettings', array($parameters));
    }

    /**
     * @param getExclusionInfoForCatalog $parameters
     * @access public
     * @return getExclusionInfoForCatalogResponse
     */
    public function getExclusionInfoForCatalog(getExclusionInfoForCatalog $parameters)
    {
      return $this->__soapCall('getExclusionInfoForCatalog', array($parameters));
    }

    /**
     * @param getAutomationScripts $parameters
     * @access public
     * @return getAutomationScriptsResponse
     */
    public function getAutomationScripts(getAutomationScripts $parameters)
    {
      return $this->__soapCall('getAutomationScripts', array($parameters));
    }

    /**
     * @param getUserPreferences $parameters
     * @access public
     * @return getUserPreferencesResponse
     */
    public function getUserPreferences(getUserPreferences $parameters)
    {
      return $this->__soapCall('getUserPreferences', array($parameters));
    }

    /**
     * @param setUserPreferences $parameters
     * @access public
     * @return setUserPreferencesResponse
     */
    public function setUserPreferences(setUserPreferences $parameters)
    {
      return $this->__soapCall('setUserPreferences', array($parameters));
    }

    /**
     * @param getWatchFolder $parameters
     * @access public
     * @return getWatchFolderResponse
     */
    public function getWatchFolder(getWatchFolder $parameters)
    {
      return $this->__soapCall('getWatchFolder', array($parameters));
    }

    /**
     * @param logout $parameters
     * @access public
     * @return logoutResponse
     */
    public function logout(logout $parameters)
    {
      return $this->__soapCall('logout', array($parameters));
    }

    /**
     * @param getCatalogingOptions $parameters
     * @access public
     * @return getCatalogingOptionsResponse
     */
    public function getCatalogingOptions(getCatalogingOptions $parameters)
    {
      return $this->__soapCall('getCatalogingOptions', array($parameters));
    }

    /**
     * @param getIngestConfig $parameters
     * @access public
     * @return getIngestConfigResponse
     */
    public function getIngestConfig(getIngestConfig $parameters)
    {
      return $this->__soapCall('getIngestConfig', array($parameters));
    }

    /**
     * @param addWatchFolder $parameters
     * @access public
     * @return addWatchFolderResponse
     */
    public function addWatchFolder(addWatchFolder $parameters)
    {
      return $this->__soapCall('addWatchFolder', array($parameters));
    }

    /**
     * @param removeWatchFolder $parameters
     * @access public
     * @return removeWatchFolderResponse
     */
    public function removeWatchFolder(removeWatchFolder $parameters)
    {
      return $this->__soapCall('removeWatchFolder', array($parameters));
    }

    /**
     * @param getServerFolderNames $parameters
     * @access public
     * @return getServerFolderNamesResponse
     */
    public function getServerFolderNames(getServerFolderNames $parameters)
    {
      return $this->__soapCall('getServerFolderNames', array($parameters));
    }

    /**
     * @param getServerSystemInformation $parameters
     * @access public
     * @return getServerSystemInformationResponse
     */
    public function getServerSystemInformation(getServerSystemInformation $parameters)
    {
      return $this->__soapCall('getServerSystemInformation', array($parameters));
    }

    /**
     * @param getFieldDefinitions $parameters
     * @access public
     * @return getFieldDefinitionsResponse
     */
    public function getFieldDefinitions(getFieldDefinitions $parameters)
    {
      return $this->__soapCall('getFieldDefinitions', array($parameters));
    }

    /**
     * @param addOrRemovePredefinedValues $parameters
     * @access public
     * @return addOrRemovePredefinedValuesResponse
     */
    public function addOrRemovePredefinedValues(addOrRemovePredefinedValues $parameters)
    {
      return $this->__soapCall('addOrRemovePredefinedValues', array($parameters));
    }

    /**
     * @param setPredefinedValues $parameters
     * @access public
     * @return setPredefinedValuesResponse
     */
    public function setPredefinedValues(setPredefinedValues $parameters)
    {
      return $this->__soapCall('setPredefinedValues', array($parameters));
    }

    /**
     * @param getCatalogPermissions $parameters
     * @access public
     * @return getCatalogPermissionsResponse
     */
    public function getCatalogPermissions(getCatalogPermissions $parameters)
    {
      return $this->__soapCall('getCatalogPermissions', array($parameters));
    }

    /**
     * @param getUnmatchedFieldValuesFromBatchFind $parameters
     * @access public
     * @return getUnmatchedFieldValuesFromBatchFindResponse
     */
    public function getUnmatchedFieldValuesFromBatchFind(getUnmatchedFieldValuesFromBatchFind $parameters)
    {
      return $this->__soapCall('getUnmatchedFieldValuesFromBatchFind', array($parameters));
    }

    /**
     * @param getStatusForJobs $parameters
     * @access public
     * @return getStatusForJobsResponse
     */
    public function getStatusForJobs(getStatusForJobs $parameters)
    {
      return $this->__soapCall('getStatusForJobs', array($parameters));
    }

    /**
     * @param addNestedPredefinedValues $parameters
     * @access public
     * @return addNestedPredefinedValuesResponse
     */
    public function addNestedPredefinedValues(addNestedPredefinedValues $parameters)
    {
      return $this->__soapCall('addNestedPredefinedValues', array($parameters));
    }

    /**
     * @param changeNestedPredefinedValue $parameters
     * @access public
     * @return changeNestedPredefinedValueResponse
     */
    public function changeNestedPredefinedValue(changeNestedPredefinedValue $parameters)
    {
      return $this->__soapCall('changeNestedPredefinedValue', array($parameters));
    }

    /**
     * @param moveNestedPredefinedValue $parameters
     * @access public
     * @return moveNestedPredefinedValueResponse
     */
    public function moveNestedPredefinedValue(moveNestedPredefinedValue $parameters)
    {
      return $this->__soapCall('moveNestedPredefinedValue', array($parameters));
    }

    /**
     * @param deleteNestedPredefinedValues $parameters
     * @access public
     * @return deleteNestedPredefinedValuesResponse
     */
    public function deleteNestedPredefinedValues(deleteNestedPredefinedValues $parameters)
    {
      return $this->__soapCall('deleteNestedPredefinedValues', array($parameters));
    }

    /**
     * @param getRSAPublicEncryptionKey $parameters
     * @access public
     * @return getRSAPublicEncryptionKeyResponse
     */
    public function getRSAPublicEncryptionKey(getRSAPublicEncryptionKey $parameters)
    {
      return $this->__soapCall('getRSAPublicEncryptionKey', array($parameters));
    }

    /**
     * @param listOutputDestination $parameters
     * @access public
     * @return listOutputDestinationResponse
     */
    public function listOutputDestination(listOutputDestination $parameters)
    {
      return $this->__soapCall('listOutputDestination', array($parameters));
    }

    /**
     * @param listRenameType $parameters
     * @access public
     * @return listRenameTypeResponse
     */
    public function listRenameType(listRenameType $parameters)
    {
      return $this->__soapCall('listRenameType', array($parameters));
    }

    /**
     * @param listDNGEmbedRawFile $parameters
     * @access public
     * @return listDNGEmbedRawFileResponse
     */
    public function listDNGEmbedRawFile(listDNGEmbedRawFile $parameters)
    {
      return $this->__soapCall('listDNGEmbedRawFile', array($parameters));
    }

    /**
     * @param listWatermarkType $parameters
     * @access public
     * @return listWatermarkTypeResponse
     */
    public function listWatermarkType(listWatermarkType $parameters)
    {
      return $this->__soapCall('listWatermarkType', array($parameters));
    }

    /**
     * @param listWatermarkPosition $parameters
     * @access public
     * @return listWatermarkPositionResponse
     */
    public function listWatermarkPosition(listWatermarkPosition $parameters)
    {
      return $this->__soapCall('listWatermarkPosition', array($parameters));
    }

    /**
     * @param listAddToCatalog $parameters
     * @access public
     * @return listAddToCatalogResponse
     */
    public function listAddToCatalog(listAddToCatalog $parameters)
    {
      return $this->__soapCall('listAddToCatalog', array($parameters));
    }

    /**
     * @param getCatalogChangeStatus $parameters
     * @access public
     * @return getCatalogChangeStatusResponse
     */
    public function getCatalogChangeStatus(getCatalogChangeStatus $parameters)
    {
      return $this->__soapCall('getCatalogChangeStatus', array($parameters));
    }

    /**
     * @param listDngCameraRawVersion $parameters
     * @access public
     * @return listDngCameraRawVersionResponse
     */
    public function listDngCameraRawVersion(listDngCameraRawVersion $parameters)
    {
      return $this->__soapCall('listDngCameraRawVersion', array($parameters));
    }

    /**
     * @param listCompressionType $parameters
     * @access public
     * @return listCompressionTypeResponse
     */
    public function listCompressionType(listCompressionType $parameters)
    {
      return $this->__soapCall('listCompressionType', array($parameters));
    }

    /**
     * @param getVideoExtensions $parameters
     * @access public
     * @return getVideoExtensionsResponse
     */
    public function getVideoExtensions(getVideoExtensions $parameters)
    {
      return $this->__soapCall('getVideoExtensions', array($parameters));
    }

    /**
     * @param getWatchFolders $parameters
     * @access public
     * @return getWatchFoldersResponse
     */
    public function getWatchFolders(getWatchFolders $parameters)
    {
      return $this->__soapCall('getWatchFolders', array($parameters));
    }

    /**
     * @param removeItemsFromGallery $parameters
     * @access public
     * @return removeItemsFromGalleryResponse
     */
    public function removeItemsFromGallery(removeItemsFromGallery $parameters)
    {
      return $this->__soapCall('removeItemsFromGallery', array($parameters));
    }

    /**
     * @param primeAssetPreviews $parameters
     * @access public
     * @return primeAssetPreviewsResponse
     */
    public function primeAssetPreviews(primeAssetPreviews $parameters)
    {
      return $this->__soapCall('primeAssetPreviews', array($parameters));
    }

    /**
     * @param setSessionInactivityTimeout $parameters
     * @access public
     * @return setSessionInactivityTimeoutResponse
     */
    public function setSessionInactivityTimeout(setSessionInactivityTimeout $parameters)
    {
      return $this->__soapCall('setSessionInactivityTimeout', array($parameters));
    }

    /**
     * @param listDngJpegPreviewType $parameters
     * @access public
     * @return listDngJpegPreviewTypeResponse
     */
    public function listDngJpegPreviewType(listDngJpegPreviewType $parameters)
    {
      return $this->__soapCall('listDngJpegPreviewType', array($parameters));
    }

    /**
     * @param getAudioExtensions $parameters
     * @access public
     * @return getAudioExtensionsResponse
     */
    public function getAudioExtensions(getAudioExtensions $parameters)
    {
      return $this->__soapCall('getAudioExtensions', array($parameters));
    }

    /**
     * @param listResizeType $parameters
     * @access public
     * @return listResizeTypeResponse
     */
    public function listResizeType(listResizeType $parameters)
    {
      return $this->__soapCall('listResizeType', array($parameters));
    }

    /**
     * @param listOutputFileFormat $parameters
     * @access public
     * @return listOutputFileFormatResponse
     */
    public function listOutputFileFormat(listOutputFileFormat $parameters)
    {
      return $this->__soapCall('listOutputFileFormat', array($parameters));
    }

    /**
     * @param listTaskSettings $parameters
     * @access public
     * @return listTaskSettingsResponse
     */
    public function listTaskSettings(listTaskSettings $parameters)
    {
      return $this->__soapCall('listTaskSettings', array($parameters));
    }

    /**
     * @param updateAssetFieldValues $parameters
     * @access public
     * @return updateAssetFieldValuesResponse
     */
    public function updateAssetFieldValues(updateAssetFieldValues $parameters)
    {
      return $this->__soapCall('updateAssetFieldValues', array($parameters));
    }

    /**
     * @param synchronizeFolder $parameters
     * @access public
     * @return synchronizeFolderResponse
     */
    public function synchronizeFolder(synchronizeFolder $parameters)
    {
      return $this->__soapCall('synchronizeFolder', array($parameters));
    }

    /**
     * @param getFolderTreeForWatchFolder $parameters
     * @access public
     * @return getFolderTreeForWatchFolderResponse
     */
    public function getFolderTreeForWatchFolder(getFolderTreeForWatchFolder $parameters)
    {
      return $this->__soapCall('getFolderTreeForWatchFolder', array($parameters));
    }

    /**
     * @param removeAssetsFromCatalog $parameters
     * @access public
     * @return removeAssetsFromCatalogResponse
     */
    public function removeAssetsFromCatalog(removeAssetsFromCatalog $parameters)
    {
      return $this->__soapCall('removeAssetsFromCatalog', array($parameters));
    }

    /**
     * @param getAssetPreview $parameters
     * @access public
     * @return getAssetPreviewResponse
     */
    public function getAssetPreview(getAssetPreview $parameters)
    {
      return $this->__soapCall('getAssetPreview', array($parameters));
    }

    /**
     * @param getErrorDetailsForJob $parameters
     * @access public
     * @return getErrorDetailsForJobResponse
     */
    public function getErrorDetailsForJob(getErrorDetailsForJob $parameters)
    {
      return $this->__soapCall('getErrorDetailsForJob', array($parameters));
    }

    /**
     * @param deleteSubfolder $parameters
     * @access public
     * @return deleteSubfolderResponse
     */
    public function deleteSubfolder(deleteSubfolder $parameters)
    {
      return $this->__soapCall('deleteSubfolder', array($parameters));
    }

    /**
     * @param updateWatchFolder $parameters
     * @access public
     * @return updateWatchFolderResponse
     */
    public function updateWatchFolder(updateWatchFolder $parameters)
    {
      return $this->__soapCall('updateWatchFolder', array($parameters));
    }

    /**
     * @param createSubfolder $parameters
     * @access public
     * @return createSubfolderResponse
     */
    public function createSubfolder(createSubfolder $parameters)
    {
      return $this->__soapCall('createSubfolder', array($parameters));
    }

    /**
     * @param addAssetsByPath $parameters
     * @access public
     * @return addAssetsByPathResponse
     */
    public function addAssetsByPath(addAssetsByPath $parameters)
    {
      return $this->__soapCall('addAssetsByPath', array($parameters));
    }

    /**
     * @param addItemsToGallery $parameters
     * @access public
     * @return addItemsToGalleryResponse
     */
    public function addItemsToGallery(addItemsToGallery $parameters)
    {
      return $this->__soapCall('addItemsToGallery', array($parameters));
    }

    /**
     * @param listColorMode $parameters
     * @access public
     * @return listColorModeResponse
     */
    public function listColorMode(listColorMode $parameters)
    {
      return $this->__soapCall('listColorMode', array($parameters));
    }

    /**
     * @param completion $parameters
     * @access public
     * @return completionResponse
     */
    public function completion(completion $parameters)
    {
      return $this->__soapCall('completion', array($parameters));
    }

    /**
     * @param uploadFile $parameters
     * @access public
     * @return uploadFileResponse
     */
    public function uploadFile(uploadFile $parameters)
    {
      return $this->__soapCall('uploadFile', array($parameters));
    }

    /**
     * @param getJobIDs $parameters
     * @access public
     * @return getJobIDsResponse
     */
    public function getJobIDs(getJobIDs $parameters)
    {
      return $this->__soapCall('getJobIDs', array($parameters));
    }

    /**
     * @param createGallery $parameters
     * @access public
     * @return createGalleryResponse
     */
    public function createGallery(createGallery $parameters)
    {
      return $this->__soapCall('createGallery', array($parameters));
    }

    /**
     * @param moveSubfolder $parameters
     * @access public
     * @return moveSubfolderResponse
     */
    public function moveSubfolder(moveSubfolder $parameters)
    {
      return $this->__soapCall('moveSubfolder', array($parameters));
    }

    /**
     * @param runJob $parameters
     * @access public
     * @return runJobResponse
     */
    public function runJob(runJob $parameters)
    {
      return $this->__soapCall('runJob', array($parameters));
    }

    /**
     * @param cancelJob $parameters
     * @access public
     * @return cancelJobResponse
     */
    public function cancelJob(cancelJob $parameters)
    {
      return $this->__soapCall('cancelJob', array($parameters));
    }

    /**
     * @param listUnit $parameters
     * @access public
     * @return listUnitResponse
     */
    public function listUnit(listUnit $parameters)
    {
      return $this->__soapCall('listUnit', array($parameters));
    }

}

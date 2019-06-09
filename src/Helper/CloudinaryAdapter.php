<?php

namespace App\Helper;

use Exception;
use Cloudinary;
use Cloudinary\Api as Api;
use Cloudinary\Uploader;
use League\Flysystem\Config;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Adapter\Polyfill\NotSupportingVisibilityTrait;

class CloudinaryAdapter implements AdapterInterface{
  
  protected $api;

  use NotSupportingVisibilityTrait;

  public function __construct(array $config){
    Cloudinary::config($config);
    $this->api = new Api;
  }

  public function write($path, $contents, Config $config){
    $tempfile = tmpfile();
    fwrite($tempfile, $contents);

    $uploaded_metadata = $this->writeStream($path, $tempfile, $config);
    return $uploaded_metadata;
  }

  public function writeStream($path, $resource, Config $config){
    $resource_metadata = stream_get_meta_data($resource);
    $uploaded_metadata = Uploader::upload($resource_metadata['uri'], ['public_id' => $path]);
    return $uploaded_metadata;
  }

  public function update($path, $contents, Config $config){
    return $this->write($path, $contents, $config);
  }

  public function updateStream($path, $resource, Config $config){
    return $this->writeStream($path, $resource, $config);
  }

  public function rename($path, $newpath){
    $pathinfo = pathinfo($path);
    if ($pathinfo['dirname'] != '.') {
      $path_remote = $pathinfo['dirname'] . '/' . $pathinfo['filename'];
    } else {
      $path_remote = $pathinfo['filename'];
    }

    $newpathinfo = pathinfo($newpath);
    if ($newpathinfo['dirname'] != '.') {
      $newpath_remote = $newpathinfo['dirname'] . '/' . $newpathinfo['filename'];
    } else {
      $newpath_remote = $newpathinfo['filename'];
    }

    $result = Uploader::rename($path_remote, $newpath_remote);
    return $result['public_id'] == $newpathinfo['filename'];
  }

  public function copy($path, $newpath){
    $url = cloudinary_url_internal($path);
    $result = Uploader::upload($url, ['public_id' => $newpath]);
    return is_array($result) ? $result['public_id'] == $newpath : false;
  }

  public function delete($path){
    $result = Uploader::destroy($path, ['invalidate' => true]);
    return is_array($result) ? $result['result'] == 'ok' : false;
  }

  public function deleteDir($dirname){
    $response = $this->api->delete_resources_by_prefix($dirname);
    return true;
  }

  public function createDir($dirname, Config $config){
    return ['path' => $dirname];
  }

  public function has($path){
    try {
      $this->api->resource($path);
    } catch (Exception $e) {
      return false;
    }
    return true;
  }

  public function read($path){
    $contents = file_get_contents(cloudinary_url($path));
    return compact('contents', 'path');
  }

  public function readStream($path){
    try {
        $stream = fopen(cloudinary_url($path), 'r');
    } catch (Exception $e) {
        return false;
    }
    return compact('stream', 'path');
  }

  public function listContents($directory = '', $recursive = false){
    $resources = ((array) $this->api->resources([
        'type' => 'upload',
        'prefix' => $directory
    ])['resources']);

    foreach ($resources as $i => $resource) {
        $resources[$i] = $this->prepareResourceMetadata($resource);
    }

    return $resources;
  }

  public function getMetadata($path){
    return $this->prepareResourceMetadata($this->getResource($path));
  }

  public function getResource($path){
      return (array) $this->api->resource($path);
  }

  public function getSize($path){
      return $this->prepareSize($this->getResource($path));
  }

  public function getMimetype($path){
      return $this->prepareMimetype($this->getResource($path));
  }

  public function getTimestamp($path){
      return $this->prepareTimestamp($this->getResource($path));
  }

  protected function prepareResourceMetadata($resource){
      $resource['type'] = 'file';
      $resource['path'] = $resource['public_id'];
      $resource = array_merge($resource, $this->prepareSize($resource));
      $resource = array_merge($resource, $this->prepareTimestamp($resource));
      $resource = array_merge($resource, $this->prepareMimetype($resource));
      return $resource;
  }

  protected function prepareMimetype($resource){
      $mimetype = $resource['resource_type'] . '/' . $resource['format'];
      $mimetype = str_replace('jpg', 'jpeg', $mimetype);
      return compact('mimetype');
  }

  protected function prepareTimestamp($resource){
      $timestamp = strtotime($resource['created_at']);
      return compact('timestamp');
  }

  protected function prepareSize($resource){
      $size = $resource['bytes'];
      return compact('size');
  }

}
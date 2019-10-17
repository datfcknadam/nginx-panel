<?php
use Yosymfony\Toml\Toml;
use Yosymfony\Toml\TomlBuilder;
require __DIR__ .'/../vendor/autoload.php';

class TomlFile {

  function searchFile($dir) {
    $arr = [];
    $trees = array_diff(scandir($dir), array('..', '.'));
    foreach($trees as $key => $file) {
      if (is_file($dir.DIRECTORY_SEPARATOR.$file)) {
        array_push($arr, Toml::ParseFile($dir.DIRECTORY_SEPARATOR.$file, true));
      }
      if (is_dir($dir.DIRECTORY_SEPARATOR.$file)) {
        $this->outputTree($dir.DIRECTORY_SEPARATOR.$file);
      }
    }
    return $arr;
  }

  function createFile($object) {
    $tb = new TomlBuilder();
    var_dump($object);
    $filename = $object->host;

    if (strripos($filename, "*")) {
      $filename = str_ireplace("*", "_", $filename);
    }

    fopen($filename.'.toml', "w");
    $result = $tb->addComment($filename.'.toml')
      ->addTable("$filename")
      ->addTable("'$filename'".'inuse')
      ->addValue('host', "'$object->host'")
      ->addValue('brief', "'$object->brief'")
      ->addValue('httpTarget', "'$object->httpTarget'")
      ->addValue('httpForceHttps', "'$object->httpForceHttps'")
      ->addValue('httpsTarget', "'$object->httpsTarget'")
      ->addValue('enableLetsencrypt', "'$object->enableLetsencrypt'")
      ->addValue('enableWebsockets', "'$object->enableWebsockets'")
      ->addValue('_mtime', new \Datetime());
  }
};
?>

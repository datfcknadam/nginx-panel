<?php
use Yosymfony\Toml\Toml;
require __DIR__ .'/../vendor/autoload.php';

class TomlFile {

  function outputTree($dir) {
    $arr = [];
    $trees = array_diff(scandir($dir), array('..', '.'));
    foreach($trees as $key => $file) {
      if (is_file($dir.DIRECTORY_SEPARATOR.$file)) {
        array_push($arr, Toml::ParseFile($dir.DIRECTORY_SEPARATOR.$file));
      }
      if (is_dir($dir.DIRECTORY_SEPARATOR.$file)) {
        $this->outputTree($dir.DIRECTORY_SEPARATOR.$file);
      }
    }
    return $arr;
  }
};
?>

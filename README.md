# Unyson Option Builder

​​The Unyson Option Builder has been a staple in my workflow with WordPress and Unyson FW for over four years. Previously, the process of creating a config.php or post type configuration file was tedious and required frequent consultation of the [Unyson documentation page](http://manual.unyson.io/en/latest/options/built-in/introduction.html#content). However, after considering the utility of such an option within my preferred Integrated Development Environment (IDE), I decided to embark on this project to improve my efficiency and streamline the process."

## Basic Usage

Here is a simple example how to use this library

```
// make sure you have require the autoloader
require_once __DIR__ . '/vendor/autoload.php';

$builder = new Builder();
$text1 = (new Text('fringilla'))->setLabel('Nunc fringilla');
$text2 = (new Text('rhoncus'))->setLabel('Cras eget')->setAttr(['class' => 'html-class']);

$builder->addOption($text1)->addOption($text2);

$options = $builder->getOptions();
```
will output
```
array(2) {
  [0]=>
  array(1) {
    ["fringilla"]=>
    array(2) {
      ["type"]=>
      string(4) "text"
      ["label"]=>
      string(14) "Nunc fringilla"
    }
  }
  [1]=>
  array(1) {
    ["rhoncus"]=>
    array(3) {
      ["type"]=>
      string(4) "text"
      ["attr"]=>
      array(1) {
        ["class"]=>
        string(10) "html-class"
      }
      ["label"]=>
      string(9) "Cras eget"
    }
  }
}
```

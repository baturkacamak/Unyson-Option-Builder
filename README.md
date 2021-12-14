# Unyson Option Builder

​​I have been dealing with Unyson FW for WordPress for more than 4 years as of 2021. Creating a `config.php` or a post type
configuration php file was a huge hassle until now. I had to
visit [Unyson documentation page](http://manual.unyson.io/en/latest/options/built-in/introduction.html#content) time to
time to use the options the correct way. So in the end I have decided this should be a part of the IDE that I am using. This
project was a result of this idea.

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
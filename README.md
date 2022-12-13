# Unyson Option Builder

​​The Unyson Option Builder has been a staple in my workflow with WordPress and Unyson FW for over four years. Previously, the process of creating a config.php or post type configuration file was tedious and required frequent consultation of the [Unyson documentation page](http://manual.unyson.io/en/latest/options/built-in/introduction.html#content). However, after considering the utility of such an option within my preferred Integrated Development Environment (IDE), I decided to embark on this project to improve my efficiency and streamline the process."

## Basic Usage

To use the Option Builder, you will first need to include the autoloader in your PHP script:

```
// make sure you have require the autoloader
require_once DIR . '/vendor/autoload.php';
```

Next, you can create a new instance of the `Builder` class:
```
$builder = new Builder();
```

You can then add options to the builder using the `addOption()` method, which takes an instance of one of the available option classes (such as `Text`, `Select`, etc.) as its argument. For example:
```
$text1 = (new Text('fringilla'))->withLabel('Nunc fringilla');
$text2 = (new Text('rhoncus'))->withLabel('Cras eget')->withAttr(['class' => 'html-class']);

$builder->addOption($text1)->addOption($text2);
```


To retrieve the options that have been added to the builder, you can use the `getOptions()` method, which returns an array of option arrays:
```
$options = $builder->getOptions();
```

The output of `$options` will be similar to the following:
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

You can then use these options in your WordPress and Unyson FW configuration files, or in your IDE for easier development.

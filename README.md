# readablesize

[![Build Status](https://travis-ci.org/ravjanisz/readablesize.svg?branch=master)](https://travis-ci.org/ravjanisz/readablesize)
[![codecov](https://codecov.io/gh/ravjanisz/readablesize/branch/master/graph/badge.svg)](https://codecov.io/gh/ravjanisz/readablesize)

Converts number of bytes to human readable number by taking the number of that unit that the bytes will go into it.

## Requirements

* PHP >= 7.1
* (optional) PHPUnit to run tests.

## Install

Via Composer:

```bash
$ composer require ravjanisz/readablesize
```
## Usage

```PHP
// add settings instance
use Rav\Size\SizeSettings;
// add instance
use Rav\Size\Size;

//base for calculation can be added as SizeSettings constructor parameter
//SizeSettings::BINARY or SizeSettings::DECIMAL
$settings = new SizeSettings();
//set precision for size
$settings->setPrecision(2);

//new object instance
$this->size = new Size($settings);

//return '1.46KiB'
echo $this->size->human('1500');

//convert size
//return '0.01TiB'
echo $this->size->convert(Size::MB, Size::TB, '9500');
```

## Documentation

None

## License

readablesize is licensed under the MIT License - see the LICENSE file for details

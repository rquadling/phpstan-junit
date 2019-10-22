# PHPStan JUnit error reporter

[![Build Status](https://img.shields.io/travis/rquadling/phpstan-junit.svg?style=for-the-badge&logo=travis)](https://travis-ci.org/rquadling/phpstan-junit)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/rquadling/phpstan-junit.svg?style=for-the-badge&logo=scrutinizer)](https://scrutinizer-ci.com/g/rquadling/phpstan-junit/)
[![GitHub issues](https://img.shields.io/github/issues/rquadling/phpstan-junit.svg?style=for-the-badge&logo=github)](https://github.com/rquadling/phpstan-junit/issues)

[![PHP Version](https://img.shields.io/packagist/php-v/rquadling/phpstan-junit.svg?style=for-the-badge)](https://github.com/rquadling/phpstan-junit)
[![Stable Version](https://img.shields.io/packagist/v/rquadling/phpstan-junit.svg?style=for-the-badge&label=Latest)](https://packagist.org/packages/rquadling/phpstan-junit)

[![Total Downloads](https://img.shields.io/packagist/dt/rquadling/phpstan-junit.svg?style=for-the-badge&label=Total+downloads)](https://packagist.org/packages/rquadling/phpstan-junit)
[![Monthly Downloads](https://img.shields.io/packagist/dm/rquadling/phpstan-junit.svg?style=for-the-badge&label=Monthly+downloads)](https://packagist.org/packages/rquadling/phpstan-junit)
[![Daily Downloads](https://img.shields.io/packagist/dd/rquadling/phpstan-junit.svg?style=for-the-badge&label=Daily+downloads)](https://packagist.org/packages/rquadling/phpstan-junit)

## DISCLAIMER
The code in this library is heavily (and I mean VERY VERY heavily) based upon the work in
[mavimo/phpstan-junit](https://github.com/mavimo/phpstan-junit).
I cannot stress strongly enough how much the work there is here. It is pretty much a direct rip off!

The main purpose of this fork is to allow the JUnit error reporter to operate on PHP 7.0 with the
[phpstan/phpstan-shim:0.9.2](https://github.com/phpstan/phpstan-shim), as that is my current use case.

## Scope

The main scope for this project is to create error report in **JUnit** format that can be easily integrated in *Jenkins*
or other tools that use this information.

## How to use it

### Install

You need to include this library in your project as dev-dependency.

```bash
composer require --dev rquadling/phpstan-junit
```

You will need to add the appropriate service entry to your `phpstan.neon` file in the root of your project:

```yaml
services:
    errorFormatter.junit:
        class: RQuadling\PHPStan\ErrorFormatter\JunitErrorFormatter

    relativePathHelper:
        class: PHPStan\File\RelativePathHelper
        dynamic: true
        autowired: true

    simpleRelativePathHelper:
        class: PHPStan\File\RelativePathHelper
        factory: PHPStan\File\SimpleRelativePathHelper
        arguments:
            currentWorkingDirectory: %currentWorkingDirectory%
        autowired: false
```
### Generate JUnit report

You can generate JUnit reports using `--error-format=junit`, eg:

```bash
vendor/bin/phpstan --configuration=phpstan.neon --error-format=junit --level=7 --no-progress --no-interaction analyse SOURCE_CODE_DIR
```

## Contributing

Contributions are welcome, but this particular fork will not be needed for anything other than PHP 7.0 with PHPStan-shim
v0.9.2. If you do have any contributions, then I'll certainly look at them. But if it is for any version different to
the ones mentioned, then it is probably best you look at Mavimo's version.

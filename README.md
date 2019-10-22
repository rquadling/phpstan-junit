# PHPStan JUnit error reporter

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

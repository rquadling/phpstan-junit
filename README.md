# PHPStan JUnit error reporter

## DISCLAIMER
The code in this library is heavily (and I mean VERY VERY heavily) based upon the work in
[mavimo/phpstan-junit](https://github.com/mavimo/phpstan-junit).
I cannot stress strongly enough how much the work there is here. It is pretty much a direct rip off!

The main purpose of this fork is to allow the JUnit error reporter to operate on PHP 7.0 with the
[phpstan/phpstan-shim:0.9.2](https://github.com/phpstan/phpstan-shim), as that is my current use case.

And so, with that disclaimer, the following README is from Mavimo.

## Scope

The main scope for this project is to create error report in **JUnit** format that can be easily integrated in *Jenkins*
or other tools that use this information.

## How to use it

### Install

You need to include this library in your project as dev-dependency, it depends on the version of phpstan you're using
you should use a different version of `rquadling/phpstan-junit` library.

#### PHPStan 0.10

You need to require the version `0.1.0` of this package:
```bash
composer require --dev rquadling/phpstan-junit:~0.1.0
```

You should require this extension on `phpstan.neon` file in the root of your project or the file you specify to phpstan using the `--config` flag by referencing `extension.neon` file:

```yaml
includes:
    - vendor/rquadling/phpstan-junit/phpstan.neon
```
or declaring the service via:
```yaml
services:
    errorFormatter.junit:
        class: RQuadling\PHPStan\ErrorFormatter\JunitErrorFormatter
```

#### PHPStan 0.11

The current version is not marked as stable (should be in some week), so you need to pull the version from master:
```bash
composer require --dev rquadling/phpstan-junit:~0.2.0
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set; if you don't want to use `phpstan/extension-installer`, you should require the `extension.neon` file on your `phpstan.neon.dist` file in the root of your project (or on the file you specify to phpstan using the `--config` flag):

```yaml
includes:
    - vendor/rquadling/phpstan-junit/extension.neon
```
or declaring the service via:
```yaml
services:
    errorFormatter.junit:
        class: RQuadling\PHPStan\ErrorFormatter\JunitErrorFormatter
```

### Generate JUnit report

You should gnerate JUnit report with the flag `--error-format=junit`, eg:

```bash
vendor/bin/phpstan --configuration=phpstan.neon --error-format=junit --level=7 --no-progress --no-interaction analyse SOURCE_CODE_DIR
```

## Contributing

Contributions are welcome!

PR's will be merged only if:

  - *phpunit* is :white_check_mark:, you can run it using `vendor/bin/phpunit`
  - *phpstan* is :white_check_mark:, you can run it using `vendor/bin/phpstan analyse`
  - *phpcs* is :white_check_mark:, you can run it using `vendor/bin/phpcs`
  - *code coverage* will not decrease (or there are good reason to decrease it), you can check the current coverage using `phpdbg -qrr ./vendor/bin/phpunit --coverage-text`

If you have any question feel free to open a issue or contact me!

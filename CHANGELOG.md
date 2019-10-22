# Changelog

## v0.4.1 - 2019-10-22

### Changes
- Simplify user's requirements to use this error formatter
- Refactor dependency of directory to be the required directory rather than a directory service as getting the service
  loaded via the autoloader that is within the PHAR is difficult and frankly not worth the effort.

## v0.4.0 - 2019-10-22

### Changes

The code in this library is heavily (and I mean VERY VERY heavily) based upon the work in
[mavimo/phpstan-junit](https://github.com/mavimo/phpstan-junit).
I cannot stress strongly enough how much the work there is here. It is pretty much a direct rip off!

The main purpose of this fork is to allow the JUnit error reporter to operate on PHP 7.0 with the
[phpstan/phpstan-shim:0.9.2](https://github.com/phpstan/phpstan-shim), as that is my current use case.

Several elements have been stripped out as this library has been amended from Mavimo's to used with PHP 7.0 and
PHPStan-shim v0.9.2 only.

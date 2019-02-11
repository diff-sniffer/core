Diff Sniffer Core component
===========================

[![PHP Version](https://img.shields.io/badge/php-%5E7.2-blue.svg)](https://packagist.org/packages/morozov/diff-sniffer-core)
[![Latest Stable Version](https://poser.pugx.org/morozov/diff-sniffer-core/v/stable)](https://packagist.org/packages/morozov/diff-sniffer-core)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/morozov/diff-sniffer-core/badges/quality-score.png)](https://scrutinizer-ci.com/g/morozov/diff-sniffer-core/)
[![Code Coverage](https://scrutinizer-ci.com/g/morozov/diff-sniffer-core/badges/coverage.png)](https://scrutinizer-ci.com/g/morozov/diff-sniffer-core/)
[![Travis CI Build Status](https://travis-ci.org/morozov/diff-sniffer-core.png)](https://travis-ci.org/morozov/diff-sniffer-core)
[![AppVeyor Build status](https://ci.appveyor.com/api/projects/status/fa9mr4yg36pf1kgc?svg=true)](https://ci.appveyor.com/project/morozov/diff-sniffer-core)

This is a tool that allows validation of coding standards only for changed lines but not the whole file.

This is not a working application. It provides `DiffSniffer\Changeset` interface that should be implemented in order to accomplish some results.

See existing implementations:
* [diff-sniffer-pre-commit](https://github.com/morozov/diff-sniffer-pre-commit): Git pre-commit hook
* [diff-sniffer-pull-request](https://github.com/morozov/diff-sniffer-pull-request): GitHub pull request validator

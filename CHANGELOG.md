# CHANGELOG

All notable changes to this project will be documented in this file.
The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.1.1] - 2023-06-27

### Fix

- PHP 7.4 dependencies

## [3.1.0] - 2023-06-27

### Feat

-   Updates can now be provided through the Admin interface

## [3.0.5] - 2023-03-10

### Added

-   Add no-cookie to YouTube URL's.
-   Disable oembed.
-   Remove no cookie from YouTube channel url.

## [3.0.4] - 2022-10-21

### Changed

-   Replaced Composer plugin dependency check with runtime check.

## [3.0.3] - 2022-10-07

### Chore

-   Update dependencies + reference pdc-base plugin from BitBucket to GitHub.

## [3.0.2] - 2020-08-07

### Added

-   Add revisions for FAQ entries (use [MB Revision](https://metabox.io/plugins/mb-revision/))

## [3.0.1] - 2020-08-05

### Fix

-   View content of metabox sort clone field after moving it around.

## [3.0.0] - 2020-08-04

### Changed

-   Architecture change in the pdc-base plug-in, used as dependency, affects namespaces used.

## [2.0.3]

### Fix

-   Check if required file for `is_plugin_active` is already loaded, otherwise load it. Props @Jasper Heidebrink.

### Add

-   Remove docs in plugin, in favor of generating docs remote.

## [2.0.2]

### Fix

-   Fixed meta as object.

## [2.0.1]

### Fix

-   Fix if no faq is entered, the rest api fails.

## [2.0.0]

### Features

-   Add documentation.
-   Add tests.

## [1.0.0]

### Features

-   Initial start.

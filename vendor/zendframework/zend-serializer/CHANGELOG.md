# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 2.6.0 - 2016-02-02

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#2](https://github.com/zendframework/zend-serializer/pull/2) updates the component
  to use zend-servicemanager v3. This involves updating the `AdapterPluginManager`
  to follow changes to `Zend\ServiceManager\AbstractPluginManager`, and updating
  the `Serializer` class to inject an empty `ServiceManager` into instances of
  the `AbstractPluginManager` that it creates.

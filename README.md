# loggerfactory
Simple LoggerFactory to support easy creation of PSR-3 logger objects without the need of dependency injection in the constructor methods.

## Usage

### LoggerProvider
This package requires a user-implemented class implementing the LoggerProviderInterface, which has the method
`public function getLogger(string $classname): LoggerInterface`. This class must return an instance of the PSR-3 LoggerInterface to handle
all the logger request for the current object with the given classname.

The assumption is that the LoggerProvider uses some kind of configuration to ensure the returned PSR-3 logger object handles the logging
according to the configuration.

Before perform any logging, the user-implemented logger provider must be set by calling `LoggerFactory::setLoggerProvider($loggerProvider);`.

### LoggerFactory ###
Perform `$logger = LoggerFactory::getLogger($classname);` to obtain a PSR-3 logger object to handle the logging in an object with the
classname $classname.

### LoggerFactoryTrait ###
To simplify the logic to obtain a PSR-3 logger object, include the trait LoggerFactoryTrait in the class, and perform
`self::getLogger()->debug('Some debug message');` or similar for the other logging methods.

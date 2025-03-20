<?php
namespace MawebDK\LoggerFactory;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Logger factory to be used for creating PSR-3 logger objects without dependency injection.
 */
class LoggerFactory
{
    /**
     * @var LoggerProviderInterface|null   Instance of the Logger provider to be used for creating the PSR-3 logger objects.
     */
    private static ?LoggerProviderInterface $loggerProvider = null;

    /**
     * Returns an instance of a PSR-3 logger to be used in an instance of "classname".
     * If no Logger provider has been set, an instance of NullLogger will be returned.
     * @param string $classname   Classname of the object in which the PSR-3 logger will be used.
     * @return LoggerInterface    Instance of a PSR-3 logger to be used in an instance of "classname".
     */
    public static function getLogger(string $classname): LoggerInterface
    {
        if (is_null(self::$loggerProvider)):
            return new NullLogger();
        endif;

        return self::$loggerProvider->getLogger(classname: $classname);
    }

    /**
     * Set the Logger provider to be used for creating the PSR-3 logger objects.
     * @param LoggerProviderInterface $loggerProvider   Instance of the Logger provider to be used for creating the PSR-3 logger objects.
     * @return void
     */
    public static function setLoggerProvider(LoggerProviderInterface $loggerProvider): void
    {
        self::$loggerProvider = $loggerProvider;
    }

    /**
     * Private constructor to avoid direct instantiation.
     */
    private function __construct()
    {
        // This body is empty on purpose.
    }
}
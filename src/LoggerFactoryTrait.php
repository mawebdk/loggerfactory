<?php
namespace MawebDK\LoggerFactory;

use Psr\Log\LoggerInterface;

/**
 * Trait to simplify the usage of a PSR-3 logger to be used in the class using this trait.

 * Require the PSR-3 logger by calling the static method getLogger().
 * At the first call, the PSR-3 logger will be created by calling LoggerFactory::getLogger(__CLASS__).
 */
trait LoggerFactoryTrait
{
    /**
     * @var LoggerInterface|null   PSR-3 logger to be used in this class.
     */
    private static ?LoggerInterface $logger = null;

    /**
     * Returns The PSR-3 logger to be used in this class.
     * @return LoggerInterface   PSR-3 logger to be used in this class.
     */
    public static function getLogger(): LoggerInterface
    {
        if (is_null(self::$logger)):
            self::$logger = LoggerFactory::getLogger(classname: __CLASS__);
        endif;

        return self::$logger;
    }
}
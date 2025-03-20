<?php
namespace MawebDK\LoggerFactory;

use Psr\Log\LoggerInterface;

/**
 * Logger provider interface.
 */
interface LoggerProviderInterface
{
    /**
     * Returns an instance of a PSR-3 logger to be used in an instance of "classname".
     * @param string $classname   Classname of the object in which the PSR-3 logger will be used.
     * @return LoggerInterface    Instance of a PSR-3 logger to be used in an instance of "classname".
     */
    public function getLogger(string $classname): LoggerInterface;
}
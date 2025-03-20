<?php
namespace MawebDK\LoggerFactory\Test;

use MawebDK\LoggerFactory\LoggerFactory;
use MawebDK\LoggerFactory\LoggerProviderInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use ReflectionClass;

class LoggerFactoryTest extends TestCase
{
    protected function tearDown(): void
    {
        self::resetLoggerFactoryLoggerProvider();
    }

    public function testGetLogger_Default()
    {
        $this->assertInstanceOf(expected: NullLogger::class, actual: LoggerFactory::getLogger(classname: __CLASS__));
    }

    /**
     * @throws Exception
     */
    public function testGetLogger_UsageOfLoggerProvider()
    {
        $mockLoggerProvider = $this->createMock(type: LoggerProviderInterface::class);
        $mockLoggerProvider->method(constraint: 'getLogger')->willReturn(new LoggerFactoryTest_NullLogger1());

        LoggerFactory::setLoggerProvider(loggerProvider: $mockLoggerProvider);

        $this->assertInstanceOf(expected: LoggerFactoryTest_NullLogger1::class, actual: LoggerFactory::getLogger(classname: 'classname1'));
    }


    private static function resetLoggerFactoryLoggerProvider(): void
    {
        $reflectionClass = new ReflectionClass(objectOrClass: LoggerFactory::class);
        $reflectionClass->setStaticPropertyValue(name: 'loggerProvider', value: null);
    }
}

class LoggerFactoryTest_NullLogger1 extends NullLogger {}

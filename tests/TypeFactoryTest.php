<?php

namespace UaDeviceTypeTest;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use UaDeviceType\TypeFactory;
use UaDeviceType\TypeLoader;

/**
 * Test class for \BrowserDetector\Detector\Device\Mobile\GeneralMobile
 */
class TypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \UaDeviceType\TypeFactory
     */
    private $object = null;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $adapter      = new Local(__DIR__ . '/../cache/');
        $cache        = new FilesystemCachePool(new Filesystem($adapter));
        $cache->clear();
        $loader       = new TypeLoader($cache);
        $this->object = new TypeFactory($cache, $loader);
    }

    /**
     * @uses UaDeviceType\Type::__construct
     * @uses UaDeviceType\Type::getName
     * @uses UaDeviceType\TypeLoader::__construct
     * @uses UaDeviceType\TypeLoader::init
     * @uses UaDeviceType\TypeLoader::initCache
     * @uses UaDeviceType\TypeLoader::has
     * @uses UaDeviceType\TypeLoader::load
     * @covers UaDeviceType\TypeFactory::__construct
     * @covers UaDeviceType\TypeFactory::detect
     */
    public function testLoadUnknown()
    {
        $type = $this->object->detect('unknown');

        self::assertInstanceOf('\UaDeviceType\Type', $type);
        self::assertNull($type->getName());
    }

    /**
     * @expectedException \BrowserDetector\Loader\NotFoundException
     * @expectedExceptionMessage the device type with key "does not exist" was not found
     *
     * @uses UaDeviceType\TypeLoader::__construct
     * @uses UaDeviceType\TypeLoader::init
     * @uses UaDeviceType\TypeLoader::has
     * @uses UaDeviceType\TypeLoader::load
     * @covers UaDeviceType\TypeFactory::__construct
     * @covers UaDeviceType\TypeFactory::detect
     */
    public function testLoadNotAvailable()
    {
        $this->object->detect('does not exist');
    }

    /**
     * @uses UaDeviceType\Type::__construct
     * @uses UaDeviceType\Type::getName
     * @uses UaDeviceType\Type::isConsole
     * @uses UaDeviceType\Type::isDesktop
     * @uses UaDeviceType\Type::isMobile
     * @uses UaDeviceType\Type::isPhone
     * @uses UaDeviceType\Type::isTablet
     * @uses UaDeviceType\Type::isTv
     * @uses UaDeviceType\TypeLoader::__construct
     * @covers UaDeviceType\TypeFactory::__construct
     * @covers UaDeviceType\TypeFactory::fromArray
     */
    public function testFromArray()
    {
        $name    = 'test1';
        $mobile  = true;
        $desktop = false;
        $console = null;
        $tv      = true;
        $phone   = false;
        $tablet  = true;

        $data = [
            'name'    => $name,
            'mobile'  => $mobile,
            'desktop' => $desktop,
            'console' => $console,
            'tv'      => $tv,
            'phone'   => $phone,
            'tablet'  => $tablet,
        ];

        $type = $this->object->fromArray($data);

        self::assertInstanceOf('\UaDeviceType\Type', $type);
        self::assertSame($name, $type->getName());
        self::assertTrue($type->isMobile());
        self::assertFalse($type->isDesktop());
        self::assertFalse($type->isConsole());
        self::assertTrue($type->isTv());
        self::assertFalse($type->isPhone());
        self::assertTrue($type->isTablet());
    }

    /**
     * @uses UaDeviceType\Type::__construct
     * @uses UaDeviceType\Type::getName
     * @uses UaDeviceType\Type::isConsole
     * @uses UaDeviceType\Type::isDesktop
     * @uses UaDeviceType\Type::isMobile
     * @uses UaDeviceType\Type::isPhone
     * @uses UaDeviceType\Type::isTablet
     * @uses UaDeviceType\Type::isTv
     * @uses UaDeviceType\TypeLoader::__construct
     * @uses UaDeviceType\TypeFactory::fromArray
     * @covers UaDeviceType\TypeFactory::__construct
     * @covers UaDeviceType\TypeFactory::fromJson
     */
    public function testFromJson()
    {
        $name    = 'test1';
        $mobile  = true;
        $desktop = false;
        $console = null;
        $tv      = true;
        $phone   = false;
        $tablet  = true;

        $data = [
            'name'    => $name,
            'mobile'  => $mobile,
            'desktop' => $desktop,
            'console' => $console,
            'tv'      => $tv,
            'phone'   => $phone,
            'tablet'  => $tablet,
        ];

        $type = $this->object->fromJson(json_encode($data));

        self::assertInstanceOf('\UaDeviceType\Type', $type);
        self::assertSame($name, $type->getName());
        self::assertTrue($type->isMobile());
        self::assertFalse($type->isDesktop());
        self::assertFalse($type->isConsole());
        self::assertTrue($type->isTv());
        self::assertFalse($type->isPhone());
        self::assertTrue($type->isTablet());
    }
}

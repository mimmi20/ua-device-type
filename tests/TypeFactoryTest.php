<?php

namespace UaDeviceTypeTest;

use UaDeviceType\TypeFactory;

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
        $this->object = new TypeFactory();
    }

    /**
     *
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
     *
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

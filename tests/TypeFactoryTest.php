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
        $type    = 'testType';
        $name    = 'test1';
        $mobile  = true;
        $desktop = false;
        $console = null;
        $tv      = true;
        $phone   = false;
        $tablet  = true;

        $data = [
            'type'    => $type,
            'name'    => $name,
            'mobile'  => $mobile,
            'desktop' => $desktop,
            'console' => $console,
            'tv'      => $tv,
            'phone'   => $phone,
            'tablet'  => $tablet,
        ];

        $result = $this->object->fromArray($data);

        self::assertInstanceOf('\UaDeviceType\Type', $result);
        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertTrue($result->isMobile());
        self::assertFalse($result->isDesktop());
        self::assertFalse($result->isConsole());
        self::assertTrue($result->isTv());
        self::assertFalse($result->isPhone());
        self::assertTrue($result->isTablet());
    }

    /**
     *
     */
    public function testFromJson()
    {
        $type    = 'testType';
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

        $result = $this->object->fromJson(json_encode($data));

        self::assertInstanceOf('\UaDeviceType\Type', $result);
        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertTrue($result->isMobile());
        self::assertFalse($result->isDesktop());
        self::assertFalse($result->isConsole());
        self::assertTrue($result->isTv());
        self::assertFalse($result->isPhone());
        self::assertTrue($result->isTablet());
    }
}

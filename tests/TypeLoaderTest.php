<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2018, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace UaDeviceTypeTest;

use UaDeviceType\TypeLoader;

/**
 * Test class for \BrowserDetector\Loader\BrowserLoader
 */
class TypeLoaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \UaDeviceType\TypeLoader
     */
    private $object;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = TypeLoader::getInstance();
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        TypeLoader::resetInstance();
    }

    /**
     * @return void
     */
    public function testHasUnknown(): void
    {
        self::assertTrue($this->object->has('unknown'));
    }

    /**
     * @return void
     */
    public function testLoadUnknown(): void
    {
        $type = $this->object->load('unknown');

        self::assertInstanceOf('\UaDeviceType\Type', $type);
        self::assertNull($type->getName());
    }

    /**
     * @return void
     */
    public function testLoadNotAvailable(): void
    {
        $this->expectException('\BrowserDetector\Loader\NotFoundException');
        $this->expectExceptionMessage('the device type with key "does not exist" was not found');

        $this->object->load('does not exist');
    }
}

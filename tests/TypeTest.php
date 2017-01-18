<?php
/**
 * Copyright (c) 2012-2017, Thomas Mueller <t_mueller_stolzenhain@yahoo.de>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category  BrowserDetector
 *
 * @author    Thomas Mueller <t_mueller_stolzenhain@yahoo.de>
 * @copyright 2012-2017 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 *
 * @link      https://github.com/mimmi20/BrowserDetector
 */

namespace UaDeviceTypeTest;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use UaDeviceType\Type;
use UaDeviceType\TypeFactory;
use UaDeviceType\TypeLoader;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * tests the constructor and the getter
     *
     * @covers UaDeviceType\Type::__construct()
     * @covers UaDeviceType\Type::getName()
     * @covers UaDeviceType\Type::isMobile()
     * @covers UaDeviceType\Type::isDesktop()
     * @covers UaDeviceType\Type::isConsole()
     * @covers UaDeviceType\Type::isTv()
     * @covers UaDeviceType\Type::isPhone()
     * @covers UaDeviceType\Type::isTablet()
     */
    public function testSetterGetter()
    {
        $name    = 'test1';
        $mobile  = true;
        $desktop = false;
        $console = null;
        $tv      = 2;
        $phone   = [];
        $tablet  = new \stdClass();

        $type = new Type($name, $mobile, $desktop, $console, $tv, $phone, $tablet);

        self::assertSame($name, $type->getName());
        self::assertTrue($type->isMobile());
        self::assertFalse($type->isDesktop());
        self::assertNull($type->isConsole());
        self::assertSame($tv, $type->isTv());
        self::assertSame($phone, $type->isPhone());
        self::assertSame($tablet, $type->isTablet());

        return $type;
    }

    /**
     * tests the __toString function
     *
     * @covers UaDeviceType\Type::__construct
     * @covers UaDeviceType\Type::getName
     * @covers UaDeviceType\Type::__toString()
     */
    public function testTostring()
    {
        $name = false;
        $type = new Type($name);

        self::assertSame('', (string) $type);
    }

    /**
     * tests the serialize and the unserialize functions
     *
     * @param \UaDeviceType\Type $type
     *
     * @depends testSetterGetter
     * @covers UaDeviceType\Type::toArray
     * @covers UaDeviceType\Type::serialize()
     * @covers UaDeviceType\Type::unserialize()
     */
    public function testSerialize(Type $type)
    {
        $serialized = serialize($type);
        self::assertEquals($type, unserialize($serialized));
    }

    /**
     * tests the toJson function
     *
     * @param \UaDeviceType\Type $type
     *
     * @depends testSetterGetter
     * @uses UaDeviceType\TypeFactory::__construct
     * @uses UaDeviceType\TypeFactory::fromArray
     * @uses UaDeviceType\TypeFactory::fromJson
     * @uses UaDeviceType\TypeLoader::__construct
     * @covers UaDeviceType\Type::__construct
     * @covers UaDeviceType\Type::toArray
     * @covers UaDeviceType\Type::toJson
     */
    public function testTojson(Type $type)
    {
        $adapter      = new Local(__DIR__ . '/../cache/');
        $cache        = new FilesystemCachePool(new Filesystem($adapter));
        $cache->clear();
        $loader       = new TypeLoader($cache);

        $json = $type->toJson();
        self::assertEquals($type, (new TypeFactory($cache, $loader))->fromJson($json));
    }

    /**
     * tests the toArray function
     *
     * @param \UaDeviceType\Type $type
     *
     * @depends testSetterGetter
     * @uses UaDeviceType\TypeFactory::__construct
     * @uses UaDeviceType\TypeFactory::fromArray
     * @uses UaDeviceType\TypeLoader::__construct
     * @covers UaDeviceType\Type::__construct
     * @covers UaDeviceType\Type::toArray
     * @covers UaDeviceType\Type::toJson
     */
    public function testToarray(Type $type)
    {
        $adapter      = new Local(__DIR__ . '/../cache/');
        $cache        = new FilesystemCachePool(new Filesystem($adapter));
        $cache->clear();
        $loader       = new TypeLoader($cache);

        $array = $type->toArray();
        self::assertEquals($type, (new TypeFactory($cache, $loader))->fromArray($array));
    }
}

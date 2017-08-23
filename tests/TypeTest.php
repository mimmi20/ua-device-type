<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2017, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace UaDeviceTypeTest;

use UaDeviceType\Type;

class TypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * tests the constructor and the getter
     */
    public function testSetterGetter()
    {
        $type    = 'testType';
        $name    = 'test1';
        $mobile  = true;
        $desktop = false;
        $console = false;
        $tv      = true;
        $phone   = true;
        $tablet  = false;

        $result = new Type($type, $name, $mobile, $desktop, $console, $tv, $phone, $tablet);

        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertTrue($result->isMobile());
        self::assertFalse($result->isDesktop());
        self::assertFalse($result->isConsole());
        self::assertTrue($result->isTv());
        self::assertTrue($result->isPhone());
        self::assertFalse($result->isTablet());
    }
}

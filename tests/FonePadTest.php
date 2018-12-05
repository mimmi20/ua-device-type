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

use PHPUnit\Framework\TestCase;
use UaDeviceType\FonePad;

final class FonePadTest extends TestCase
{
    /**
     * tests the constructor and the getter
     *
     * @return void
     */
    public function testSetterGetter(): void
    {
        $type = 'fone-pad';
        $name = 'FonePad';

        $result = new FonePad();

        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertTrue($result->isMobile());
        self::assertFalse($result->isDesktop());
        self::assertFalse($result->isConsole());
        self::assertFalse($result->isTv());
        self::assertTrue($result->isPhone());
        self::assertTrue($result->isTablet());
    }
}

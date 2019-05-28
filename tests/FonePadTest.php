<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2019, Thomas Mueller <mimmi20@live.de>
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
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @return void
     */
    public function testSetterGetter(): void
    {
        $type = 'fone-pad';
        $name = 'FonePad';

        $result = new FonePad();

        static::assertSame($type, $result->getType());
        static::assertSame($name, $result->getName());
        static::assertTrue($result->isMobile());
        static::assertFalse($result->isDesktop());
        static::assertFalse($result->isConsole());
        static::assertFalse($result->isTv());
        static::assertTrue($result->isPhone());
        static::assertTrue($result->isTablet());
        static::assertSame(
            'a mobile device with its own screen (greater than 7") which are able to make phone calls',
            $result->getDescription()
        );
    }
}

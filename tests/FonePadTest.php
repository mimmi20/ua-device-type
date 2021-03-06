<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2021, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace UaDeviceTypeTest;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use UaDeviceType\FonePad;

final class FonePadTest extends TestCase
{
    /**
     * tests the constructor and the getter
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
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
        self::assertSame(
            'a mobile device with its own screen (greater than 7") which are able to make phone calls',
            $result->getDescription()
        );
    }
}

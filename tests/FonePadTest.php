<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2023, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace UaDeviceTypeTest;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use UaDeviceType\FonePad;

final class FonePadTest extends TestCase
{
    private const TYPE = 'fone-pad';

    private const NAME = 'FonePad';

    /**
     * tests the constructor and the getter
     *
     * @throws ExpectationFailedException
     */
    public function testSetterGetter(): void
    {
        $result = new FonePad();

        self::assertSame(self::TYPE, $result->getType());
        self::assertSame(self::NAME, $result->getName());
        self::assertTrue($result->isMobile());
        self::assertFalse($result->isDesktop());
        self::assertFalse($result->isConsole());
        self::assertFalse($result->isTv());
        self::assertTrue($result->isPhone());
        self::assertTrue($result->isTablet());
        self::assertSame(
            'a mobile device with its own screen (greater than 7") which are able to make phone calls',
            $result->getDescription(),
        );
    }
}

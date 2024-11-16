<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2024, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace UaDeviceTypeTest;

use Override;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use UaDeviceType\Exception\NotFoundException;
use UaDeviceType\TypeLoader;
use UaDeviceType\Unknown;

final class TypeLoaderTest extends TestCase
{
    private TypeLoader $object;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @throws void
     */
    #[Override]
    protected function setUp(): void
    {
        $this->object = new TypeLoader();
    }

    /** @throws ExpectationFailedException */
    public function testHasUnknown(): void
    {
        self::assertTrue($this->object->has('unknown'));
    }

    /** @throws ExpectationFailedException */
    public function testHasNotWong(): void
    {
        self::assertFalse($this->object->has('does not exist'));
    }

    /**
     * @throws Exception
     * @throws NotFoundException
     */
    public function testLoadUnknown(): void
    {
        $type = $this->object->load('unknown');

        self::assertInstanceOf(Unknown::class, $type);
        self::assertNull($type->getName());
    }

    /** @throws NotFoundException */
    public function testLoadNotAvailable(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('the device type with key "does not exist" was not found');

        $this->object->load('does not exist');
    }
}

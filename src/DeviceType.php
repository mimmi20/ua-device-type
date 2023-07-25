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

namespace UaDeviceType;

trait DeviceType
{
    /**
     * Returns the type name of the device
     *
     * @throws void
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * Returns the name of the type
     *
     * @throws void
     */
    public function getName(): string | null
    {
        return self::NAME;
    }

    /**
     * Returns True, if the device is a mobile device
     *
     * @throws void
     */
    public function isMobile(): bool
    {
        return self::MOBILE;
    }

    /**
     * Returns True, if the device is a desktop device
     *
     * @throws void
     */
    public function isDesktop(): bool
    {
        return self::DESKTOP;
    }

    /**
     * Returns True, if the device is a gaming device
     *
     * @throws void
     */
    public function isConsole(): bool
    {
        return self::CONSOLE;
    }

    /**
     * Returns True, if the device is a tv device
     *
     * @throws void
     */
    public function isTv(): bool
    {
        return self::TV;
    }

    /**
     * Returns True, if the device is a phone device
     *
     * @throws void
     */
    public function isPhone(): bool
    {
        return self::PHONE;
    }

    /**
     * Returns True, if the device is a tablet device
     *
     * @throws void
     */
    public function isTablet(): bool
    {
        return self::TABLET;
    }

    /**
     * Returns a description for the device
     *
     * @throws void
     */
    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}

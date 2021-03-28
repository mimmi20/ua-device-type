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

namespace UaDeviceType;

trait DeviceType
{
    /**
     * Returns the type name of the device
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * Returns the name of the type
     */
    public function getName(): ?string
    {
        return self::NAME;
    }

    /**
     * Returns True, if the device is a mobile device
     */
    public function isMobile(): bool
    {
        return self::MOBILE;
    }

    /**
     * Returns True, if the device is a desktop device
     */
    public function isDesktop(): bool
    {
        return self::DESKTOP;
    }

    /**
     * Returns True, if the device is a gaming device
     */
    public function isConsole(): bool
    {
        return self::CONSOLE;
    }

    /**
     * Returns True, if the device is a tv device
     */
    public function isTv(): bool
    {
        return self::TV;
    }

    /**
     * Returns True, if the device is a phone device
     */
    public function isPhone(): bool
    {
        return self::PHONE;
    }

    /**
     * Returns True, if the device is a tablet device
     */
    public function isTablet(): bool
    {
        return self::TABLET;
    }

    /**
     * Returns a description for the device
     */
    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}

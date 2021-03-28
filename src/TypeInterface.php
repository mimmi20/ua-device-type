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

interface TypeInterface
{
    /**
     * Returns the type name of the device
     */
    public function getType(): string;

    /**
     * Returns the name of the device
     */
    public function getName(): ?string;

    /**
     * Returns True, if the device is a mobile device
     */
    public function isMobile(): bool;

    /**
     * Returns True, if the device is a desktop device
     */
    public function isDesktop(): bool;

    /**
     * Returns True, if the device is a gaming device
     */
    public function isConsole(): bool;

    /**
     * Returns True, if the device is a tv device
     */
    public function isTv(): bool;

    /**
     * Returns True, if the device is a phone device
     */
    public function isPhone(): bool;

    /**
     * Returns True, if the device is a tablet device
     */
    public function isTablet(): bool;

    /**
     * Returns a description for the device
     */
    public function getDescription(): string;
}

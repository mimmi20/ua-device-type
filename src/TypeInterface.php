<?php

/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2025, Thomas Mueller <mimmi20@live.de>
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
     *
     * @throws void
     */
    public function getType(): string;

    /**
     * Returns the name of the device
     *
     * @throws void
     */
    public function getName(): string | null;

    /**
     * Returns True, if the device is a mobile device
     *
     * @throws void
     */
    public function isMobile(): bool;

    /**
     * Returns True, if the device is a desktop device
     *
     * @throws void
     */
    public function isDesktop(): bool;

    /**
     * Returns True, if the device is a gaming device
     *
     * @throws void
     */
    public function isConsole(): bool;

    /**
     * Returns True, if the device is a tv device
     *
     * @throws void
     */
    public function isTv(): bool;

    /**
     * Returns True, if the device is a phone device
     *
     * @throws void
     */
    public function isPhone(): bool;

    /**
     * Returns True, if the device is a tablet device
     *
     * @throws void
     */
    public function isTablet(): bool;

    /**
     * Returns True, if the device has its own display
     *
     * @throws void
     */
    public function hasDisplay(): bool;

    /**
     * Returns True, if the device has its own touch display
     *
     * @throws void
     */
    public function hasTouch(): bool;

    /**
     * Returns a description for the device
     *
     * @throws void
     */
    public function getDescription(): string;
}

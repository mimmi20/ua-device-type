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
namespace UaDeviceType;

interface TypeInterface
{
    /**
     * Returns the type name of the device
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Returns the name of the device
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Returns True, if the Device is a mobile device
     *
     * @return bool
     */
    public function isMobile(): bool;

    /**
     * Returns True, if the Device is a desktop device
     *
     * @return bool
     */
    public function isDesktop(): bool;

    /**
     * Returns True, if the Device is a console
     *
     * @return bool
     */
    public function isConsole(): bool;

    /**
     * Returns True, if the Device is a tv device
     *
     * @return bool
     */
    public function isTv(): bool;

    /**
     * Returns True, if the Device is a mobile phone
     *
     * @return bool
     */
    public function isPhone(): bool;

    /**
     * Returns True, if the Device is a tablet device
     *
     * @return bool
     */
    public function isTablet(): bool;
}

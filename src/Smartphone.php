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

final class Smartphone implements TypeInterface
{
    use DeviceTypeTrait;

    public const string TYPE = 'smartphone';

    /**
     * the name of the device
     */
    private const string NAME = 'Smartphone';

    /**
     * the device is a mobile device
     */
    private const bool MOBILE = true;

    /**
     * the device is a desktop device
     */
    private const bool DESKTOP = false;

    /**
     * the device is a gaming device
     */
    private const bool CONSOLE = false;

    /**
     * the device is a tv device
     */
    private const bool TV = false;

    /**
     * the device is a phone device
     */
    private const bool PHONE = true;

    /**
     * the device is a tablet device
     */
    private const bool TABLET = false;

    /**
     * description for the device
     */
    private const string DESCRIPTION = 'a mobile device with its own touch screen (less than 6") which are able to make phone calls';
}

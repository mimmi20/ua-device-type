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

final class TvStick implements TypeInterface
{
    use DeviceTypeTrait;

    public const string TYPE = 'tv-stick';

    /**
     * the name of the device
     */
    private const string NAME = 'TV Stick';

    /**
     * the device is a mobile device
     */
    private const bool MOBILE = false;

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
    private const bool TV = true;

    /**
     * the device is a phone device
     */
    private const bool PHONE = false;

    /**
     * the device is a tablet device
     */
    private const bool TABLET = false;

    /**
     * description for the device
     */
    private const string DESCRIPTION = 'a media player in the form of a USB stick which uses a tv as screen';
}

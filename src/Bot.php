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

final class Bot implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'bot';

    /**
     * the name of the device
     */
    private const NAME = 'Bot';

    /**
     * the device is a mobile device
     */
    private const MOBILE = false;

    /**
     * the device is a desktop device
     */
    private const DESKTOP = false;

    /**
     * the device is a gaming device
     */
    private const CONSOLE = false;

    /**
     * the device is a tv device
     */
    private const TV = false;

    /**
     * the device is a phone device
     */
    private const PHONE = false;

    /**
     * the device is a tablet device
     */
    private const TABLET = false;

    /**
     * description for the device
     */
    private const DESCRIPTION = 'a device type related to bots';
}

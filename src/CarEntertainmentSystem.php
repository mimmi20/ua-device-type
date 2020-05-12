<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2020, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace UaDeviceType;

final class CarEntertainmentSystem implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'car-entertainment-system';

    /**
     * the name of the device
     *
     * @var string|null
     */
    private const NAME = 'Car Entertainment System';

    /**
     * the device is a mobile device
     *
     * @var bool
     */
    private const MOBILE = false;

    /**
     * the device is a desktop device
     *
     * @var bool
     */
    private const DESKTOP = false;

    /**
     * the device is a gaming device
     *
     * @var bool
     */
    private const CONSOLE = false;

    /**
     * the device is a tv device
     *
     * @var bool
     */
    private const TV = false;

    /**
     * the device is a phone device
     *
     * @var bool
     */
    private const PHONE = false;

    /**
     * the device is a tablet device
     *
     * @var bool
     */
    private const TABLET = false;

    /**
     * description for the device
     *
     * @var string
     */
    private const DESCRIPTION = 'a entertainment device implemented in a car';
}

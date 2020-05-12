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

final class FonePad implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'fone-pad';

    /**
     * the name of the device
     *
     * @var string|null
     */
    private const NAME = 'FonePad';

    /**
     * the device is a mobile device
     *
     * @var bool
     */
    private const MOBILE = true;

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
    private const PHONE = true;

    /**
     * the device is a tablet device
     *
     * @var bool
     */
    private const TABLET = true;

    /**
     * description for the device
     *
     * @var string
     */
    private const DESCRIPTION = 'a mobile device with its own screen (greater than 7") which are able to make phone calls';
}

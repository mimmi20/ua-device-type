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

final class FonePad implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'fone-pad';

    /**
     * the name of the device
     *
     * @var string|null
     */
    public const NAME = 'FonePad';

    /**
     * the Device is a mobile device
     *
     * @var bool
     */
    public const MOBILE = true;

    /**
     * the Device is a desktop device
     *
     * @var bool
     */
    public const DESKTOP = false;

    /**
     * the Device is a console
     *
     * @var bool
     */
    public const CONSOLE = false;

    /**
     * the Device is a tv device
     *
     * @var bool
     */
    public const TV = false;

    /**
     * the Device is a mobile phone
     *
     * @var bool
     */
    public const PHONE = true;

    /**
     * the Device is a tablet device
     *
     * @var bool
     */
    public const TABLET = true;
}

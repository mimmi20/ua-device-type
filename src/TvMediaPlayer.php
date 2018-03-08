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

final class TvMediaPlayer implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'tv-media-player';

    /**
     * the name of the device
     *
     * @var string|null
     */
    private const NAME = 'Media Player';

    /**
     * the Device is a mobile device
     *
     * @var bool
     */
    private const MOBILE = false;

    /**
     * the Device is a desktop device
     *
     * @var bool
     */
    private const DESKTOP = false;

    /**
     * the Device is a console
     *
     * @var bool
     */
    private const CONSOLE = false;

    /**
     * the Device is a tv device
     *
     * @var bool
     */
    private const TV = true;

    /**
     * the Device is a mobile phone
     *
     * @var bool
     */
    private const PHONE = false;

    /**
     * the Device is a tablet device
     *
     * @var bool
     */
    private const TABLET = false;
}

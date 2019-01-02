<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2019, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace UaDeviceType;

final class FeaturePhone implements TypeInterface
{
    use DeviceType;

    public const TYPE = 'feature-phone';

    /**
     * the name of the device
     *
     * @var string|null
     */
    private const NAME = 'Feature Phone';

    /**
     * the Device is a mobile device
     *
     * @var bool
     */
    private const MOBILE = true;

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
    private const TV = false;

    /**
     * the Device is a mobile phone
     *
     * @var bool
     */
    private const PHONE = true;

    /**
     * the Device is a tablet device
     *
     * @var bool
     */
    private const TABLET = false;
}

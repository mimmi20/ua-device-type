<?php
/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2017, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace UaDeviceType;

/**
 * @category  BrowserDetector
 *
 * @copyright 2012-2017 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 */
interface TypeInterface
{
    /**
     * Returns the type name of the device
     *
     * @return string
     */
    public function getType();

    /**
     * Returns the name of the device
     *
     * @return string
     */
    public function getName();

    /**
     * Returns True, if the Device is a mobile device
     *
     * @return bool
     */
    public function isMobile();

    /**
     * Returns True, if the Device is a desktop device
     *
     * @return bool
     */
    public function isDesktop();

    /**
     * Returns True, if the Device is a console
     *
     * @return bool
     */
    public function isConsole();

    /**
     * Returns True, if the Device is a tv device
     *
     * @return bool
     */
    public function isTv();

    /**
     * Returns True, if the Device is a mobile phone
     *
     * @return bool
     */
    public function isPhone();

    /**
     * Returns True, if the Device is a tablet device
     *
     * @return bool
     */
    public function isTablet();
}

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
class Type implements TypeInterface
{
    /**
     * the type name of the device
     *
     * @var string
     */
    private $type = null;

    /**
     * the name of the device
     *
     * @var string|null
     */
    private $name = null;

    /**
     * the Device is a mobile device
     *
     * @var bool
     */
    private $mobile = false;

    /**
     * the Device is a desktop device
     *
     * @var bool
     */
    private $desktop = false;

    /**
     * the Device is a console
     *
     * @var bool
     */
    private $console = false;

    /**
     * the Device is a tv device
     *
     * @var bool
     */
    private $tv = false;

    /**
     * the Device is a mobile phone
     *
     * @var bool
     */
    private $phone = false;

    /**
     * the Device is a tablet device
     *
     * @var bool
     */
    private $tablet = false;

    /**
     * @param string      $type
     * @param string|null $name
     * @param bool        $mobile
     * @param bool        $desktop
     * @param bool        $console
     * @param bool        $tv
     * @param bool        $phone
     * @param bool        $tablet
     */
    public function __construct(
        string $type,
        ?string $name = null,
        bool $mobile = false,
        bool $desktop = false,
        bool $console = false,
        bool $tv = false,
        bool $phone = false,
        bool $tablet = false
    ) {
        $this->type    = $type;
        $this->name    = $name;
        $this->mobile  = $mobile;
        $this->desktop = $desktop;
        $this->console = $console;
        $this->tv      = $tv;
        $this->phone   = $phone;
        $this->tablet  = $tablet;
    }

    /**
     * Returns the type name of the device
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Returns the name of the type
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns True, if the Device is a mobile device
     *
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->mobile;
    }

    /**
     * Returns True, if the Device is a desktop device
     *
     * @return bool
     */
    public function isDesktop(): bool
    {
        return $this->desktop;
    }

    /**
     * Returns True, if the Device is a console
     *
     * @return bool
     */
    public function isConsole(): bool
    {
        return $this->console;
    }

    /**
     * Returns True, if the Device is a tv device
     *
     * @return bool
     */
    public function isTv(): bool
    {
        return $this->tv;
    }

    /**
     * Returns True, if the Device is a mobile phone
     *
     * @return bool
     */
    public function isPhone(): bool
    {
        return $this->phone;
    }

    /**
     * Returns True, if the Device is a tablet device
     *
     * @return bool
     */
    public function isTablet(): bool
    {
        return $this->tablet;
    }
}

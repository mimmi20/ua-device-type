<?php
/**
 * Copyright (c) 2012-2017, Thomas Mueller <t_mueller_stolzenhain@yahoo.de>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category  BrowserDetector
 *
 * @author    Thomas Mueller <t_mueller_stolzenhain@yahoo.de>
 * @copyright 2012-2017 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 *
 * @link      https://github.com/mimmi20/BrowserDetector
 */

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
     * @var string|null
     */
    private $type = null;

    /**
     * the name of the device
     *
     * @var string
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
     * @param string $type
     * @param string $name
     * @param bool   $mobile
     * @param bool   $desktop
     * @param bool   $console
     * @param bool   $tv
     * @param bool   $phone
     * @param bool   $tablet
     */
    public function __construct(
        $type,
        $name,
        $mobile = false,
        $desktop = false,
        $console = false,
        $tv = false,
        $phone = false,
        $tablet = false
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the name of the type
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns True, if the Device is a mobile device
     *
     * @return bool
     */
    public function isMobile()
    {
        return $this->mobile;
    }

    /**
     * Returns True, if the Device is a desktop device
     *
     * @return bool
     */
    public function isDesktop()
    {
        return $this->desktop;
    }

    /**
     * Returns True, if the Device is a console
     *
     * @return bool
     */
    public function isConsole()
    {
        return $this->console;
    }

    /**
     * Returns True, if the Device is a tv device
     *
     * @return bool
     */
    public function isTv()
    {
        return $this->tv;
    }

    /**
     * Returns True, if the Device is a mobile phone
     *
     * @return bool
     */
    public function isPhone()
    {
        return $this->phone;
    }

    /**
     * Returns True, if the Device is a tablet device
     *
     * @return bool
     */
    public function isTablet()
    {
        return $this->tablet;
    }
}

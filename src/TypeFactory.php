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

use BrowserDetector\Factory\FactoryInterface;
use BrowserDetector\Loader\LoaderInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * @category  BrowserDetector
 *
 * @copyright 2012-2017 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 */
class TypeFactory implements FactoryInterface
{
    const BOT                      = 'bot';
    const CAR_ENTERTAINMENT_SYSTEM = 'car-entertainment-system';
    const CONSOLE                  = 'console';
    const DESKTOP                  = 'desktop';
    const DIGITAL_CAMERA           = 'digital-camera';
    const FEATURE_PHONE            = 'feature-phone';
    const FONE_PAD                 = 'fone-pad';
    const MOBILE_CONSOLE           = 'mobile-console';
    const MOBILE_DEVICE            = 'mobile-device';
    const MOBILE_MEDIA_PLAYER      = 'mobile-media-player';
    const MOBILE_PHONE             = 'mobile-phone';
    const PHABLET                  = 'phablet';
    const SMARTPHONE               = 'smartphone';
    const TABLET                   = 'tablet';
    const TV                       = 'tv';
    const TV_CONSOLE               = 'tv-console';
    const TV_MEDIA_PLAYER          = 'tv-media-player';
    const UNKNOWN                  = 'unknown';

    /**
     * @var \Psr\Cache\CacheItemPoolInterface|null
     */
    private $cache = null;

    /**
     * @var \BrowserDetector\Loader\LoaderInterface|null
     */
    private $loader = null;

    /**
     * @param \Psr\Cache\CacheItemPoolInterface       $cache
     * @param \BrowserDetector\Loader\LoaderInterface $loader
     */
    public function __construct(CacheItemPoolInterface $cache, LoaderInterface $loader)
    {
        $this->cache  = $cache;
        $this->loader = $loader;
    }

    /**
     * Gets the information about the browser type
     *
     * @param string $type
     *
     * @return \UaDeviceType\TypeInterface
     */
    public function detect($type)
    {
        return $this->loader->load($type);
    }

    /**
     * @param array $data
     *
     * @return \UaDeviceType\TypeInterface
     */
    public function fromArray(array $data)
    {
        $name    = isset($data['name']) ? $data['name'] : null;
        $mobile  = isset($data['mobile']) ? $data['mobile'] : false;
        $desktop = isset($data['desktop']) ? $data['desktop'] : false;
        $console = isset($data['console']) ? $data['console'] : false;
        $tv      = isset($data['tv']) ? $data['tv'] : false;
        $phone   = isset($data['phone']) ? $data['phone'] : false;
        $tablet  = isset($data['tablet']) ? $data['tablet'] : false;

        return new Type($name, $mobile, $desktop, $console, $tv, $phone, $tablet);
    }

    /**
     * @param string $json
     *
     * @return \UaDeviceType\TypeInterface
     */
    public function fromJson($json)
    {
        return $this->fromArray((array) json_decode($json));
    }
}

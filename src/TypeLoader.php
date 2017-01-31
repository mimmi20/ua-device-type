<?php
/**
 * Copyright (c) 2012-2016, Thomas Mueller <mimmi20@live.de>
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
 * @author    Thomas Mueller <mimmi20@live.de>
 * @copyright 2012-2016 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 *
 * @link      https://github.com/mimmi20/BrowserDetector
 */

namespace UaDeviceType;

use BrowserDetector\Loader\LoaderInterface;
use BrowserDetector\Loader\NotFoundException;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Browser detection class
 *
 * @category  BrowserDetector
 *
 * @author    Thomas Mueller <mimmi20@live.de>
 * @copyright 2012-2016 Thomas Mueller
 * @license   http://www.opensource.org/licenses/MIT MIT License
 */
class TypeLoader implements LoaderInterface
{
    /**
     * @var \Psr\Cache\CacheItemPoolInterface|null
     */
    private $cache = null;

    /**
     * @param \Psr\Cache\CacheItemPoolInterface $cache
     */
    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * initializes cache
     */
    private function init()
    {
        $cacheInitializedId = hash('sha512', 'device-type-cache is initialized');
        $cacheInitialized   = $this->cache->getItem($cacheInitializedId);

        if (!$cacheInitialized->isHit() || !$cacheInitialized->get()) {
            $this->initCache($cacheInitialized);
        }
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        $this->init();

        $cacheItem = $this->cache->getItem(hash('sha512', 'device-type-cache-' . $key));

        return $cacheItem->isHit();
    }

    /**
     * @param string $key
     *
     * @throws \BrowserDetector\Loader\NotFoundException
     *
     * @return \UaDeviceType\TypeInterface
     */
    public function load($key)
    {
        $this->init();

        if (!$this->has($key)) {
            throw new NotFoundException('the device type with key "' . $key . '" was not found');
        }

        $cacheItem = $this->cache->getItem(hash('sha512', 'device-type-cache-' . $key));

        $type = $cacheItem->get();

        return new Type(
            $type->type,
            $type->name,
            $type->mobile,
            $type->desktop,
            $type->console,
            $type->tv,
            $type->phone,
            $type->tablet
        );
    }

    /**
     * @param \Psr\Cache\CacheItemInterface $cacheInitialized
     */
    private function initCache(CacheItemInterface $cacheInitialized)
    {
        static $types = null;

        if (null === $types) {
            $types = json_decode(file_get_contents(__DIR__ . '/../data/types.json'));
        }

        foreach ($types as $key => $data) {
            $cacheItem = $this->cache->getItem(hash('sha512', 'device-type-cache-' . $key));
            $cacheItem->set($data);

            $this->cache->save($cacheItem);
        }

        $cacheInitialized->set(true);
        $this->cache->save($cacheInitialized);
    }
}

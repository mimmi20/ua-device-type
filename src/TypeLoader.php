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

use BrowserDetector\Loader\LoaderInterface;
use BrowserDetector\Loader\NotFoundException;
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
     * initializes cache
     */
    private function init()
    {
        $cacheInitializedId = hash('sha512', 'device-type-cache is initialized');
        $cacheInitialized   = $this->cache->getItem($cacheInitializedId);

        if ($cacheInitialized->isHit() && $cacheInitialized->get()) {
            return;
        }

        foreach ($this->getTypes() as $key => $data) {
            $cacheItem = $this->cache->getItem(hash('sha512', 'device-type-cache-' . $key));
            $cacheItem->set($data);

            $this->cache->save($cacheItem);
        }

        $cacheInitialized->set(true);
        $this->cache->save($cacheInitialized);
    }

    /**
     * @return array[]
     */
    private function getTypes()
    {
        static $types = null;

        if (null === $types) {
            $types = json_decode(file_get_contents(__DIR__ . '/../data/types.json'));
        }

        foreach ($types as $key => $data) {
            yield $key => $data;
        }
    }
}

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
     * @var \stdClass[]
     */
    private $types = [];

    /**
     * @var self|null
     */
    private static $instance;

    /**
     * @return self
     */
    private function __construct()
    {
        // nothing to do here
    }

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        $this->init();

        return array_key_exists($key, $this->types);
    }

    /**
     * @param string $key
     *
     * @throws \BrowserDetector\Loader\NotFoundException
     *
     * @return \UaDeviceType\TypeInterface
     */
    public function load(string $key): TypeInterface
    {
        $this->init();

        if (!$this->has($key)) {
            throw new NotFoundException('the device type with key "' . $key . '" was not found');
        }

        $type = $this->types[$key];

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
     *
     * @return void
     */
    private function init(): void
    {
        $this->types = [];

        foreach ($this->getTypes() as $key => $data) {
            $this->types[$key] = $data;
        }
    }

    /**
     * @return \Generator|\stdClass[]
     */
    private function getTypes(): \Generator
    {
        static $types = null;

        if (null === $types) {
            $types = json_decode(file_get_contents(__DIR__ . '/../data/types.json'), false);
        }

        foreach ($types as $key => $data) {
            yield $key => $data;
        }
    }
}

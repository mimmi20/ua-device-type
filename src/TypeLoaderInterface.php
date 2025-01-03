<?php

/**
 * This file is part of the ua-device-type package.
 *
 * Copyright (c) 2015-2025, Thomas Mueller <mimmi20@live.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace UaDeviceType;

use UaDeviceType\Exception\NotFoundException;

interface TypeLoaderInterface
{
    /** @throws NotFoundException */
    public function load(string $key): TypeInterface;
}

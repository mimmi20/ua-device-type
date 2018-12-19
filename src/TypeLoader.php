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

use BrowserDetector\Loader\NotFoundException;

final class TypeLoader implements TypeLoaderInterface
{
    private const OPTIONS = [
        Bot::TYPE                    => Bot::class,
        Car::TYPE                    => Car::class,
        CarEntertainmentSystem::TYPE => CarEntertainmentSystem::class,
        Console::TYPE                => Console::class,
        Desktop::TYPE                => Desktop::class,
        DigitalCamera::TYPE          => DigitalCamera::class,
        EbookReader::TYPE            => EbookReader::class,
        FeaturePhone::TYPE           => FeaturePhone::class,
        FonePad::TYPE                => FonePad::class,
        MobileConsole::TYPE          => MobileConsole::class,
        MobileDevice::TYPE           => MobileDevice::class,
        MobileMediaPlayer::TYPE      => MobileMediaPlayer::class,
        MobilePhone::TYPE            => MobilePhone::class,
        Phablet::TYPE                => Phablet::class,
        Smartphone::TYPE             => Smartphone::class,
        Speaker::TYPE                => Speaker::class,
        Tablet::TYPE                 => Tablet::class,
        Tv::TYPE                     => Tv::class,
        TvConsole::TYPE              => TvConsole::class,
        TvMediaPlayer::TYPE          => TvMediaPlayer::class,
        Unknown::TYPE                => Unknown::class,
        Watch::TYPE                  => Watch::class,
    ];

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, self::OPTIONS);
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
        if (!$this->has($key)) {
            throw new NotFoundException('the device type with key "' . $key . '" was not found');
        }

        $class = self::OPTIONS[$key];

        return new $class();
    }
}

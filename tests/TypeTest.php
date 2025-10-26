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

namespace UaDeviceTypeTest;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use UaDeviceType\Type;

use function sprintf;

final class TypeTest extends TestCase
{
    /**
     * tests the constructor and the getter
     *
     * @throws ExpectationFailedException
     */
    #[DataProvider('provider')]
    public function testType(
        string $type,
        string $name,
        bool $isMobile,
        bool $isDesktop,
        bool $isConsole,
        bool $isTv,
        bool $isPhone,
        bool $isTablet,
        bool $hasDisplay,
        bool $hasTouch,
        string $description,
    ): void {
        $result = Type::tryFrom($type);

        if ($result === null) {
            self::fail(sprintf('unknown type %s', $type));
        }

        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertSame($isMobile, $result->isMobile());
        self::assertSame($isDesktop, $result->isDesktop());
        self::assertSame($isConsole, $result->isConsole());
        self::assertSame($isTv, $result->isTv());
        self::assertSame($isPhone, $result->isPhone());
        self::assertSame($isTablet, $result->isTablet());
        self::assertSame($hasDisplay, $result->hasDisplay());
        self::assertSame($hasTouch, $result->hasTouch());
        self::assertSame($description, $result->getDescription());

        $result3 = Type::fromName($type);

        self::assertSame($type, $result3->getType());
        self::assertSame($name, $result3->getName());
        self::assertSame($isMobile, $result3->isMobile());
        self::assertSame($isDesktop, $result3->isDesktop());
        self::assertSame($isConsole, $result3->isConsole());
        self::assertSame($isTv, $result3->isTv());
        self::assertSame($isPhone, $result3->isPhone());
        self::assertSame($isTablet, $result3->isTablet());
        self::assertSame($hasDisplay, $result3->hasDisplay());
        self::assertSame($hasTouch, $result3->hasTouch());
        self::assertSame($description, $result3->getDescription());

        $result2 = Type::fromName($name);

        self::assertSame($type, $result2->getType());
        self::assertSame($name, $result2->getName());
        self::assertSame($isMobile, $result2->isMobile());
        self::assertSame($isDesktop, $result2->isDesktop());
        self::assertSame($isConsole, $result2->isConsole());
        self::assertSame($isTv, $result2->isTv());
        self::assertSame($isPhone, $result2->isPhone());
        self::assertSame($isTablet, $result2->isTablet());
        self::assertSame($hasDisplay, $result2->hasDisplay());
        self::assertSame($hasTouch, $result2->hasTouch());
        self::assertSame($description, $result2->getDescription());

        $result4 = Type::fromName($result->value);

        self::assertSame($type, $result4->getType());
        self::assertSame($name, $result4->getName());
        self::assertSame($isMobile, $result4->isMobile());
        self::assertSame($isDesktop, $result4->isDesktop());
        self::assertSame($isConsole, $result4->isConsole());
        self::assertSame($isTv, $result4->isTv());
        self::assertSame($isPhone, $result4->isPhone());
        self::assertSame($isTablet, $result4->isTablet());
        self::assertSame($hasDisplay, $result4->hasDisplay());
        self::assertSame($hasTouch, $result4->hasTouch());
        self::assertSame($description, $result4->getDescription());

        $result5 = Type::fromName($result->name);

        self::assertSame($type, $result5->getType());
        self::assertSame($name, $result5->getName());
        self::assertSame($isMobile, $result5->isMobile());
        self::assertSame($isDesktop, $result5->isDesktop());
        self::assertSame($isConsole, $result5->isConsole());
        self::assertSame($isTv, $result5->isTv());
        self::assertSame($isPhone, $result5->isPhone());
        self::assertSame($isTablet, $result5->isTablet());
        self::assertSame($hasDisplay, $result5->hasDisplay());
        self::assertSame($hasTouch, $result5->hasTouch());
        self::assertSame($description, $result5->getDescription());
    }

    /**
     * @return array<int, array{type: string, name: string, isMobile: bool, isDesktop: bool, isConsole: bool, isTv: bool, isPhone: bool, isTablet: bool, hasDisplay: bool, hasTouch: bool, description: string}>
     *
     * @throws void
     */
    public static function provider(): array
    {
        return [
            [
                'type' => 'bot',
                'name' => 'Bot',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a device type related to bots',
            ],
            [
                'type' => 'braille-display',
                'name' => 'Brailledisplay',
                'isMobile' => false,
                'isDesktop' => true,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a device without touch but with a braille output',
            ],
            [
                'type' => 'braille-touch',
                'name' => 'Brailletouch',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => true,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a device with touch and a braille output',
            ],
            [
                'type' => 'car',
                'name' => 'Car',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a device implemented in a car, but not for entertainment',
            ],
            [
                'type' => 'car-entertainment-system',
                'name' => 'Car Entertainment System',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a entertainment device implemented in a car',
            ],
            [
                'type' => 'console',
                'name' => 'Console',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => true,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a non-mobile device without its own screen mainly used to play games',
            ],
            [
                'type' => 'desktop',
                'name' => 'Desktop',
                'isMobile' => false,
                'isDesktop' => true,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a non-mobile device without its own screen',
            ],
            [
                'type' => 'digital-camera',
                'name' => 'Digital Camera',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device to create photos',
            ],
            [
                'type' => 'ebook-reader',
                'name' => 'Ebook Reader',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device with its own screen to read E-Books',
            ],
            [
                'type' => 'feature-phone',
                'name' => 'Feature Phone',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a mobile device with its own screen, mostly without touch or older platforms',
            ],
            [
                'type' => 'fone-pad',
                'name' => 'FonePad',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => true,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a tablet device which is able to make phone calls',
            ],
            [
                'type' => 'fridge-freezer',
                'name' => 'Fridge Freezer',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a fridge/freezer with a touch screen',
            ],
            [
                'type' => 'laptop',
                'name' => 'Laptop',
                'isMobile' => false,
                'isDesktop' => true,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a non-mobile device with its own screen',
            ],
            [
                'type' => 'media-player',
                'name' => 'Media Player',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => true,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a non-mobile entertainment device with its own screen without the ability to make phone calls',
            ],
            [
                'type' => 'mobile-console',
                'name' => 'Mobile Console',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => true,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device with its own screen without ability to make phone calls, mainly used to gaming',
            ],
            [
                'type' => 'mobile-device',
                'name' => 'Mobile Device',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a general mobile device with its own screen without the ability to make phone calls',
            ],
            [
                'type' => 'mobile-media-player',
                'name' => 'Mobile Media Player',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile entertainment device with its own screen without the ability to make phone calls',
            ],
            [
                'type' => 'mobile-phone',
                'name' => 'Mobile Phone',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a general mobile device which is able to make phone calls',
            ],
            [
                'type' => 'phablet',
                'name' => 'Phablet',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device with its own screen which is able to make phone calls',
            ],
            [
                'type' => 'phone',
                'name' => 'Phone',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a non-mobile device without touch display which is able to make phone calls',
            ],
            [
                'type' => 'printer',
                'name' => 'Printer',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a printer with a touch screen',
            ],
            [
                'type' => 'smart-display',
                'name' => 'Smart Display',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a non-mobile device with its own touch screen',
            ],
            [
                'type' => 'smartphone',
                'name' => 'Smartphone',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device with its own touch screen which is able to make phone calls',
            ],
            [
                'type' => 'smart-speaker',
                'name' => 'Smart Speaker',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a smart speaker without its own screen',
            ],
            [
                'type' => 'smart-watch',
                'name' => 'SmartWatch',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a smart watch',
            ],
            [
                'type' => 'tablet',
                'name' => 'Tablet',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => true,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile device with its own screen which is not able to make phone calls',
            ],
            [
                'type' => 'tv',
                'name' => 'TV',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a tv',
            ],
            [
                'type' => 'tv-console',
                'name' => 'TV Console',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => true,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a non-mobile device which uses a tv as screen, mainly used for gaming',
            ],
            [
                'type' => 'tv-media-player',
                'name' => 'TV Media Player',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a general media player which uses a tv as screen',
            ],
            [
                'type' => 'tv-set-top-box',
                'name' => 'TV SetTop Box',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a media player which uses a tv as screen',
            ],
            [
                'type' => 'tv-stick',
                'name' => 'TV Stick',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a media player in the form of a USB stick which uses a tv as screen',
            ],
            [
                'type' => 'video-phone',
                'name' => 'VideoPhone',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a non-mobile device with touch display which is able to make phone calls',
            ],
            [
                'type' => 'unknown',
                'name' => 'Unknown',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'an unknown device',
            ],
            [
                'type' => 'wearable',
                'name' => 'Wearable',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a general mobile device with its own touch screen',
            ],
        ];
    }

    /**
     * tests the constructor and the getter
     *
     * @throws ExpectationFailedException
     */
    #[DataProvider('providerFallback')]
    public function testFallbackType(
        string $fallback,
        string $type,
        string $name,
        bool $isMobile,
        bool $isDesktop,
        bool $isConsole,
        bool $isTv,
        bool $isPhone,
        bool $isTablet,
        bool $hasDisplay,
        bool $hasTouch,
        string $description,
    ): void {
        $result = Type::fromName($fallback);

        self::assertSame($type, $result->getType());
        self::assertSame($name, $result->getName());
        self::assertSame($isMobile, $result->isMobile());
        self::assertSame($isDesktop, $result->isDesktop());
        self::assertSame($isConsole, $result->isConsole());
        self::assertSame($isTv, $result->isTv());
        self::assertSame($isPhone, $result->isPhone());
        self::assertSame($isTablet, $result->isTablet());
        self::assertSame($hasDisplay, $result->hasDisplay());
        self::assertSame($hasTouch, $result->hasTouch());
        self::assertSame($description, $result->getDescription());
    }

    /**
     * @return array<int, array{fallback: string, type: string, name: string, isMobile: bool, isDesktop: bool, isConsole: bool, isTv: bool, isPhone: bool, isTablet: bool, hasDisplay: bool, hasTouch: bool, description: string}>
     *
     * @throws void
     */
    public static function providerFallback(): array
    {
        return [
            [
                'fallback' => 'watch',
                'type' => 'smart-watch',
                'name' => 'SmartWatch',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a smart watch',
            ],
            [
                'fallback' => 'Watch',
                'type' => 'smart-watch',
                'name' => 'SmartWatch',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a smart watch',
            ],
            [
                'fallback' => 'speaker',
                'type' => 'smart-speaker',
                'name' => 'Smart Speaker',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a smart speaker without its own screen',
            ],
            [
                'fallback' => 'Speaker',
                'type' => 'smart-speaker',
                'name' => 'Smart Speaker',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => false,
                'hasTouch' => false,
                'description' => 'a smart speaker without its own screen',
            ],
            [
                'fallback' => 'Non-Mobile Phone',
                'type' => 'phone',
                'name' => 'Phone',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a non-mobile device without touch display which is able to make phone calls',
            ],
            [
                'fallback' => 'NonMobilePhone',
                'type' => 'phone',
                'name' => 'Phone',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a non-mobile device without touch display which is able to make phone calls',
            ],
            [
                'fallback' => 'non-mobile-phone',
                'type' => 'phone',
                'name' => 'Phone',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => true,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a non-mobile device without touch display which is able to make phone calls',
            ],
            [
                'fallback' => 'Wearable',
                'type' => 'wearable',
                'name' => 'Wearable',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a general mobile device with its own touch screen',
            ],
            [
                'fallback' => 'portable media player',
                'type' => 'mobile-media-player',
                'name' => 'Mobile Media Player',
                'isMobile' => true,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => false,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => true,
                'description' => 'a mobile entertainment device with its own screen without the ability to make phone calls',
            ],
            [
                'fallback' => 'smart-tv',
                'type' => 'tv',
                'name' => 'TV',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a tv',
            ],
            [
                'fallback' => 'tv device',
                'type' => 'tv',
                'name' => 'TV',
                'isMobile' => false,
                'isDesktop' => false,
                'isConsole' => false,
                'isTv' => true,
                'isPhone' => false,
                'isTablet' => false,
                'hasDisplay' => true,
                'hasTouch' => false,
                'description' => 'a tv',
            ],
        ];
    }
}

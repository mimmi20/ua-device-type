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

use Override;

use function mb_strtolower;

enum Type: string implements TypeInterface
{
    case Bot = 'bot';

    case Brailledisplay = 'braille-display';

    case Brailletouch = 'braille-touch';

    case Car = 'car';

    case CarEntertainmentSystem = 'car-entertainment-system';

    case Console = 'console';

    case Desktop = 'desktop';

    case DigitalCamera = 'digital-camera';

    case EbookReader = 'ebook-reader';

    case FeaturePhone = 'feature-phone';

    case FonePad = 'fone-pad';

    case FridgeFreezer = 'fridge-freezer';

    case Laptop = 'laptop';

    case MediaPlayer = 'media-player';

    case MobileConsole = 'mobile-console';

    case MobileDevice = 'mobile-device';

    case MobileMediaPlayer = 'mobile-media-player';

    case MobilePhone = 'mobile-phone';

    case Peripheral = 'peripheral';

    case Phablet = 'phablet';

    case Phone = 'phone';

    case Printer = 'printer';

    case SmartDisplay = 'smart-display';

    case Smartphone = 'smartphone';

    case SmartSpeaker = 'smart-speaker';

    case SmartWatch = 'smart-watch';

    case Tablet = 'tablet';

    case Tv = 'tv';

    case TvConsole = 'tv-console';

    case TvMediaPlayer = 'tv-media-player';

    case TvSettopBox = 'tv-set-top-box';

    case TvStick = 'tv-stick';

    case VideoPhone = 'video-phone';

    case Unknown = 'unknown';

    case Wearable = 'wearable';

    /**
     * @throws void
     *
     * @api
     */
    public static function fromName(string | null $name): self
    {
        if ($name === null) {
            return self::Unknown;
        }

        return match (mb_strtolower($name)) {
            'bot' => self::Bot,
            'brailledisplay', 'braille-display' => self::Brailledisplay,
            'brailletouch', 'braille-touch' => self::Brailletouch,
            'car' => self::Car,
            'carentertainmentsystem', 'car-entertainment-system', 'car entertainment system', 'car browser' => self::CarEntertainmentSystem,
            'console' => self::Console,
            'desktop' => self::Desktop,
            'digitalcamera', 'digital-camera', 'digital camera' => self::DigitalCamera,
            'ebookreader', 'ebook-reader', 'ebook reader' => self::EbookReader,
            'featurephone', 'feature-phone', 'feature phone' => self::FeaturePhone,
            'fonepad', 'fone-pad' => self::FonePad,
            'fridgefreezer', 'fridge-freezer', 'fridge freezer' => self::FridgeFreezer,
            'laptop' => self::Laptop,
            'mediaplayer', 'media-player', 'media player' => self::MediaPlayer,
            'mobileconsole', 'mobile-console', 'mobile console' => self::MobileConsole,
            'mobiledevice', 'mobile-device', 'mobile device' => self::MobileDevice,
            'mobilemediaplayer', 'mobile-media-player', 'mobile media player', 'portable media player' => self::MobileMediaPlayer,
            'mobilephone', 'mobile-phone', 'mobile phone' => self::MobilePhone,
            'peripheral' => self::Peripheral,
            'phablet' => self::Phablet,
            'phone', 'non-mobile-phone', 'nonmobilephone', 'non-mobile phone' => self::Phone,
            'printer' => self::Printer,
            'smartdisplay', 'smart-display', 'smart display' => self::SmartDisplay,
            'smartphone' => self::Smartphone,
            'smartspeaker', 'smart-speaker', 'smart speaker', 'speaker' => self::SmartSpeaker,
            'smartwatch', 'smart-watch', 'watch' => self::SmartWatch,
            'tablet' => self::Tablet,
            'tv', 'smart-tv', 'tv device' => self::Tv,
            'tvconsole', 'tv-console', 'tv console' => self::TvConsole,
            'tvmediaplayer', 'tv-media-player', 'tv media player' => self::TvMediaPlayer,
            'tvsettopbox', 'tv-set-top-box', 'tv settop box' => self::TvSettopBox,
            'tvstick', 'tv-stick', 'tv stick' => self::TvStick,
            'videophone', 'video-phone' => self::VideoPhone,
            'wearable' => self::Wearable,
            default => self::Unknown,
        };
    }

    /**
     * Returns the type name of the device
     *
     * @throws void
     */
    #[Override]
    public function getType(): string
    {
        return $this->value;
    }

    /**
     * Returns the name of the type
     *
     * @throws void
     */
    #[Override]
    public function getName(): string
    {
        return match ($this) {
            self::CarEntertainmentSystem => 'Car Entertainment System',
            self::DigitalCamera => 'Digital Camera',
            self::EbookReader => 'Ebook Reader',
            self::FeaturePhone => 'Feature Phone',
            self::FridgeFreezer => 'Fridge Freezer',
            self::MediaPlayer => 'Media Player',
            self::MobileConsole => 'Mobile Console',
            self::MobileDevice => 'Mobile Device',
            self::MobileMediaPlayer => 'Mobile Media Player',
            self::MobilePhone => 'Mobile Phone',
            self::SmartDisplay => 'Smart Display',
            self::SmartSpeaker => 'Smart Speaker',
            self::Tv => 'TV',
            self::TvConsole => 'TV Console',
            self::TvMediaPlayer => 'TV Media Player',
            self::TvSettopBox => 'TV SetTop Box',
            self::TvStick => 'TV Stick',
            default => $this->name,
        };
    }

    /**
     * Returns True, if the device is a mobile device
     *
     * @throws void
     */
    #[Override]
    public function isMobile(): bool
    {
        return match ($this) {
            self::Brailletouch, self::DigitalCamera, self::EbookReader, self::FeaturePhone, self::FonePad, self::MobileConsole, self::MobileDevice, self::MobileMediaPlayer, self::MobilePhone, self::Phablet, self::Smartphone, self::Tablet, self::SmartWatch, self::Wearable => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a desktop device
     *
     * @throws void
     */
    #[Override]
    public function isDesktop(): bool
    {
        return match ($this) {
            self::Brailledisplay, self::Desktop, self::Laptop => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a gaming device
     *
     * @throws void
     */
    #[Override]
    public function isConsole(): bool
    {
        return match ($this) {
            self::Console, self::MobileConsole, self::TvConsole => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a tv device
     *
     * @throws void
     */
    #[Override]
    public function isTv(): bool
    {
        return match ($this) {
            self::Tv, self::TvConsole, self::TvMediaPlayer, self::TvSettopBox, self::TvStick => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a phone device
     *
     * @throws void
     */
    #[Override]
    public function isPhone(): bool
    {
        return match ($this) {
            self::FeaturePhone, self::FonePad, self::MobilePhone, self::Phablet, self::Phone, self::Smartphone, self::VideoPhone => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a tablet device
     *
     * @throws void
     */
    #[Override]
    public function isTablet(): bool
    {
        return match ($this) {
            self::Brailletouch, self::FonePad, self::MediaPlayer, self::Tablet => true,
            default => false,
        };
    }

    /**
     * Returns True, if the device is a tablet device
     *
     * @throws void
     */
    #[Override]
    public function hasDisplay(): bool
    {
        return match ($this) {
            self::Bot, self::Car, self::Console, self::Desktop, self::SmartSpeaker, self::TvConsole, self::TvMediaPlayer, self::TvSettopBox, self::TvStick, self::Unknown => false,
            default => true,
        };
    }

    /**
     * Returns True, if the device is a tablet device
     *
     * @throws void
     */
    #[Override]
    public function hasTouch(): bool
    {
        return match ($this) {
            self::Bot, self::Brailledisplay, self::Car, self::Console, self::Desktop, self::FeaturePhone, self::Laptop, self::MobileDevice, self::MobilePhone, self::Phone, self::SmartSpeaker, self::Tv, self::TvConsole, self::TvMediaPlayer, self::TvSettopBox, self::TvStick, self::Unknown => false,
            default => true,
        };
    }

    /**
     * Returns a description for the device
     *
     * @throws void
     */
    #[Override]
    public function getDescription(): string
    {
        return match ($this) {
            self::Bot => 'a device type related to bots',
            self::Brailledisplay => 'a device without touch but with a braille output',
            self::Brailletouch => 'a device with touch and a braille output',
            self::Car => 'a device implemented in a car, but not for entertainment',
            self::CarEntertainmentSystem => 'a entertainment device implemented in a car',
            self::Console => 'a non-mobile device without its own screen mainly used to play games',
            self::Desktop => 'a non-mobile device without its own screen',
            self::DigitalCamera => 'a mobile device to create photos',
            self::EbookReader => 'a mobile device with its own screen to read E-Books',
            self::FeaturePhone => 'a mobile device with its own screen, mostly without touch or older platforms',
            self::FonePad => 'a tablet device which is able to make phone calls',
            self::FridgeFreezer => 'a fridge/freezer with a touch screen',
            self::Laptop => 'a non-mobile device with its own screen',
            self::MediaPlayer => 'a non-mobile entertainment device with its own screen without the ability to make phone calls',
            self::MobileConsole => 'a mobile device with its own screen without ability to make phone calls, mainly used to gaming',
            self::MobileDevice => 'a general mobile device with its own screen without the ability to make phone calls',
            self::MobileMediaPlayer => 'a mobile entertainment device with its own screen without the ability to make phone calls',
            self::MobilePhone => 'a general mobile device which is able to make phone calls',
            self::Peripheral => 'a mobile device with its own screen',
            self::Phablet => 'a mobile device with its own screen which is able to make phone calls',
            self::Phone => 'a non-mobile device without touch display which is able to make phone calls',
            self::Printer => 'a printer with a touch screen',
            self::SmartDisplay => 'a non-mobile device with its own touch screen',
            self::Smartphone => 'a mobile device with its own touch screen which is able to make phone calls',
            self::SmartSpeaker => 'a smart speaker without its own screen',
            self::SmartWatch => 'a smart watch',
            self::Tablet => 'a mobile device with its own screen which is not able to make phone calls',
            self::Tv => 'a tv',
            self::TvConsole => 'a non-mobile device which uses a tv as screen, mainly used for gaming',
            self::TvMediaPlayer => 'a general media player which uses a tv as screen',
            self::TvSettopBox => 'a media player which uses a tv as screen',
            self::TvStick => 'a media player in the form of a USB stick which uses a tv as screen',
            self::VideoPhone => 'a non-mobile device with touch display which is able to make phone calls',
            self::Wearable => 'a general mobile device with its own touch screen',
            default => 'an unknown device',
        };
    }
}

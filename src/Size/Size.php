<?php

namespace Rav\Size;

class Size {

    const  B =  'B';
    const KB = 'KB';
    const MB = 'MB';
    const GB = 'GB';
    const TB = 'TB';
    const PB = 'PB';
    const EB = 'EB';
    const ZB = 'ZB';
    const YB = 'YB';

    private static $sizes = [
        self::B,
        self::KB,
        self::MB,
        self::GB,
        self::TB,
        self::PB,
        self::EB,
        self::ZB,
        self::YB
    ];

    private $settings;
    private $name;
    private $format;

    public function __construct(SizeSettings $settings) {
        $this->settings = $settings;
        $this->name = new SizeName($this->settings->isBinary());
        $this->format = new SizeFormat($this->settings->getPrecision());
    }

    public function human($sizeInBytes) {
        $factor = floor(log($sizeInBytes, $this->settings->getBase()));
        $size = $sizeInBytes / pow($this->settings->getBase(), $factor);
        $to = Size::$sizes[$factor];

        return $this->format->get($size, $this->name->get($to));
    }

    public function convert($from, $to, $value) {
        $fromKey = array_search($from, Size::$sizes);
        if ($fromKey === false) {
            throw new SizeException("Incorrect convert from value.");
        }

        $toKey = array_search($to, Size::$sizes);
        if ($toKey === false) {
            throw new SizeException("Incorrect convert to value.");
        }

        if (!is_numeric($value)) {
            throw new SizeException("Incorrect size value.");
        }

        $factorSign = $fromKey - $toKey;
        $factor = abs($factorSign);
        if ($factorSign > 0) {
            $size = $value * pow($this->settings->getBase(), $factor);
        } else if ($factorSign < 0) {
            $size = $value / pow($this->settings->getBase(), abs($factor));
        } else {
            $size = $value;
        }

        return $this->format->get($size, $this->name->get($to));
    }
}
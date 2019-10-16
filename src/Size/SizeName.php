<?php

namespace Rav\Size;

class SizeName {

    private static $names = [
        'binary' => [
            Size::B  => 'B',
            Size::KB => 'KiB',
            Size::MB => 'MiB',
            Size::GB => 'GiB',
            Size::TB => 'TiB',
            Size::PB => 'PiB',
            Size::EB => 'EiB',
            Size::ZB => 'ZiB',
            Size::YB => 'YiB'
        ],
        'decimal' => [
            Size::B  => Size::B,
            Size::KB => Size::KB,
            Size::MB => Size::MB,
            Size::GB => Size::GB,
            Size::TB => Size::TB,
            Size::PB => Size::PB,
            Size::EB => Size::EB,
            Size::ZB => Size::ZB,
            Size::YB => Size::YB
        ]
    ];

    private $isBinary;
    private $group;

    public function __construct($isBinary) {
        $this->isBinary = $isBinary;
        $this->group = $this->isBinary ? 'binary' : 'decimal';
    }

    public function get($sizeType) {
        return self::$names[$this->group][$sizeType];
    }
}
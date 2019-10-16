<?php

namespace Rav\Size;

class SizeFormat {

    private $precision;

    public function __construct($precision) {
        $this->precision = $precision;
    }

    public function get($size, $name) {
        if (round($size) == $size) {
            return number_format($size, 0, '.', '') . $name;
        }

        return number_format($size, $this->precision, '.', '') . $name;
    }
}
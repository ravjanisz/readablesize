<?php

namespace Rav\Size;

class SizeSettings {

    const BINARY = 1024;
    const DECIMAL = 1000;

    private $base;
    private $isBinary;
    private $precision;

    public function __construct($base = self::BINARY) {
        if (!in_array($base, [self::BINARY, self::DECIMAL])) {
            throw new SizeException("Invalid base value.");
        }

        $this->base = $base;
        $this->isBinary = $this->base === self::BINARY ? true : false;
    }

    public function getBase() {
        return $this->base;
    }

    public function isBinary() {
        return $this->isBinary;
    }

    public function setPrecision($precision) {
        if (!is_int($precision)) {
            throw new SizeException("Invalid precision value.");
        }

        $this->precision = $precision;
    }

    public function getPrecision() {
        return $this->precision;
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Rav\Size\SizeException;
use Rav\Size\SizeSettings;

class SizeSettingsTest extends TestCase {

    public function testWrongBase() {
        $this->expectException(SizeException::class);

        new SizeSettings(123);
    }

    public function testIsSetRightBinaryValues() {
        $settings = new SizeSettings(SizeSettings::BINARY);

        $this->assertEquals(SizeSettings::BINARY, $settings->getBase());
        $this->assertEquals(true, $settings->isBinary());
    }

    public function testIsSetRightDecimalValues() {
        $settings = new SizeSettings(SizeSettings::DECIMAL);

        $this->assertEquals(SizeSettings::DECIMAL, $settings->getBase());
        $this->assertEquals(false, $settings->isBinary());
    }

    public function testPrecision() {
        $settings = new SizeSettings(SizeSettings::DECIMAL);
        $settings->setPrecision(5);

        $this->assertEquals(5, $settings->getPrecision());
    }

    public function testSetPrecisionFails() {
        $this->expectException(SizeException::class);

        $settings = new SizeSettings(SizeSettings::DECIMAL);
        $settings->setPrecision(5.8);
    }
}
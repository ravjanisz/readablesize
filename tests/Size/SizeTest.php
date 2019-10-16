<?php

use PHPUnit\Framework\TestCase;
use Rav\Size\Size;
use Rav\Size\SizeSettings;
use Rav\Size\SizeException;

class SizeTest extends TestCase {

    private $size;

    protected function setUp(): void {
        $settings = new SizeSettings();
        $settings->setPrecision(2);

        $this->size = new Size($settings);
    }

    public function testFormat() {
        $this->assertEquals('1.46KiB', $this->size->human('1500'));
        $this->assertEquals('15B', $this->size->human('15'));
        $this->assertEquals('0.01TiB', $this->size->convert(Size::MB, Size::TB, '9500'));
        $this->assertEquals('1024B', $this->size->convert(Size::KB, Size::B, '1'));
        $this->assertEquals('1B', $this->size->convert(Size::B, Size::B, '1'));
    }

    public function testConvertFailFrom() {
        $this->expectException(SizeException::class);
        $this->size->convert('AA', Size::TB, '9500');
    }

    public function testConvertFailTo() {
        $this->expectException(SizeException::class);
        $this->size->convert(Size::MB, 'AA', '9500');
    }

    public function testConvertFailValue() {
        $this->expectException(SizeException::class);
        $this->size->convert(Size::MB, Size::TB, '9500,12');
    }

    /*
    public function testFormatBig() {
        $this->assertEquals('1.46KiB', $this->size->human('1222333444555'));
    }
    //*/
}
<?php

use PHPUnit\Framework\TestCase;
use Rav\Size\SizeFormat;
use Rav\Size\Size;

class SizeFormatTest extends TestCase {

    public function testFormat() {
        $format = new SizeFormat(2);

        $this->assertEquals('10B', $format->get(10, Size::B));
        $this->assertEquals('15.13KB', $format->get(15.13, Size::KB));
    }
}
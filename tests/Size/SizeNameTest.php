<?php

use PHPUnit\Framework\TestCase;
use Rav\Size\SizeName;
use Rav\Size\Size;
use PHPUnit\Framework\Error\Notice;

class SizeNameTest extends TestCase {

    public function testWrongType() {
        $this->expectException(Notice::class);

        $name = new SizeName(true);
        $name->get('invalid');
    }

    public function testBinaryNames() {
        $name = new SizeName(true);

        $this->assertEquals('B', $name->get(Size::B));
        $this->assertEquals('KiB', $name->get(Size::KB));
        $this->assertEquals('MiB', $name->get(Size::MB));
        $this->assertEquals('GiB', $name->get(Size::GB));
        $this->assertEquals('TiB', $name->get(Size::TB));
        $this->assertEquals('PiB', $name->get(Size::PB));
        $this->assertEquals('EiB', $name->get(Size::EB));
        $this->assertEquals('ZiB', $name->get(Size::ZB));
        $this->assertEquals('YiB', $name->get(Size::YB));
    }

    public function testDecimalNames() {
        $name = new SizeName(false);

        $this->assertEquals('B', $name->get(Size::B));
        $this->assertEquals('KB', $name->get(Size::KB));
        $this->assertEquals('MB', $name->get(Size::MB));
        $this->assertEquals('GB', $name->get(Size::GB));
        $this->assertEquals('TB', $name->get(Size::TB));
        $this->assertEquals('PB', $name->get(Size::PB));
        $this->assertEquals('EB', $name->get(Size::EB));
        $this->assertEquals('ZB', $name->get(Size::ZB));
        $this->assertEquals('YB', $name->get(Size::YB));
    }
}
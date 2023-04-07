<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;

class PointLight extends Light {

    public static int $lightType = 3;

    public float $u1;
    public float $u2;
    public float $u3;
    public float $u4;
    public float $u5;
    public float $u6;
    public float $u7;
    public float $u8;
    public float $u9;

    public function read(BinaryStream $binaryStream): void {

        parent::read($binaryStream);
        for ($index = 1; $index < 10; $index++) {
            $this->{'u' . $index} = $binaryStream->readFloat();
        }
    }

}

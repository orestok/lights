<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class TubeLight extends Light {

    public static int $lightType = 6;

    public Vector3 $at;
    public float $tubeLength;
    public float $blurScale;

    public function read(BinaryStream $binaryStream):void {
        parent::read($binaryStream);
        $this->at = $binaryStream->readVector3();
        $this->tubeLength = $binaryStream->readFloat();
        $this->blurScale = $binaryStream->readFloat();
    }

}

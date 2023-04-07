<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class DiscAreaLight extends Light {

    public static int $lightType = 10;
    
    private Vector3 $at;
    private Vector3 $right;
    private float $radius;
    private Vector3 $v1;
    private Vector3 $v2;
    private Vector3 $v3;

    public function read(BinaryStream $binaryStream): void {
        parent::read($binaryStream);
        $this->at = $binaryStream->readVector3();
        $this->right = $binaryStream->readVector3();
        $this->radius = $binaryStream->readFloat();
        $this->v1 = $binaryStream->readVector3();
        $this->v2 = $binaryStream->readVector3();
        $this->v3 = $binaryStream->readVector3();
    }

}

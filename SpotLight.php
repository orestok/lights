<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class SpotLight extends Light {

    public static int $lightType = 4;
    
    public Vector3 $at;
    public float $falloffAngle;
    public float $blurScale;
    public Vector3 $v1;
    public Vector3 $v2;
    public Vector3 $v3;

    public function read(BinaryStream $binaryStream): void {
        parent::read($binaryStream);
        $this->at = $binaryStream->readVector3();
        $this->falloffAngle = $binaryStream->readFloat();
        $this->blurScale = $binaryStream->readFloat();
        $this->v1 = $binaryStream->readVector3();
        $this->v2 = $binaryStream->readVector3();
        $this->v3 = $binaryStream->readVector3();
    }
    
}

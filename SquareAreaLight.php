<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class SquareAreaLight extends Light {

    public static int $lightType = 9;
    
    private Vector3 $at;
    private Vector3 $right;
    private float $width;
    private float $height;
    private float $falloffAngle;
    private float $windowTopBottomAngle;
    private Vector3 $v1;
    private Vector3 $v2;
    private Vector3 $v3;
    private int $b1;

    public function read(BinaryStream $binaryStream):void {
        parent::read($binaryStream);
        $this->at = $binaryStream->readVector3();
        $this->right = $binaryStream->readVector3();
        $this->width = $binaryStream->readFloat();
        $this->height = $binaryStream->readFloat();
        $this->falloffAngle = $binaryStream->readFloat();
        $this->windowTopBottomAngle = $binaryStream->readFloat();
        $this->v1 = $binaryStream->readVector3();
        $this->v2 = $binaryStream->readVector3();
        $this->v3 = $binaryStream->readVector3();
        $this->b1 = $binaryStream->readUInt32();
    }
    
}

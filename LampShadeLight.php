<?php

namespace Data\IO\BuyBuild\Lights;

use Spatie\Color\Rgba;
use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class LampShadeLight extends Light {

    public static int $lightType = 5;

    public Vector3 $at;
    public float $falloffAngle;
    public float $shadeLightRigMultiplier;
    public float $bottomAngle;
    public Rgba $shadeColor;
    public Vector3 $v1;
    public Vector3 $v2;
    public Vector3 $v3;

    public function read(BinaryStream $binaryStream): void {
        parent::read($binaryStream);
        $this->at = $binaryStream->readVector3();
        $this->falloffAngle = $binaryStream->readFloat();
        $this->shadeLightRigMultiplier = $binaryStream->readFloat();
        $this->bottomAngle = $binaryStream->readFloat();
        $this->shadeColor = $binaryStream->readColorSc();
        $this->v1 = $binaryStream->readVector3();
        $this->v2 = $binaryStream->readVector3();
        $this->v3 = $binaryStream->readVector3();
    }
    
}

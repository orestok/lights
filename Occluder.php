<?php

namespace Data\IO\BuyBuild\Lights;

use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

class Occluder {

    private OccluderType $type;
    private Vector3 $origin;
    private Vector3 $normal;
    private Vector3 $xAxis;
    private Vector3 $yAxis;
    private float $pairOffset;

    public function read(BinaryStream $binaryStream): void {
        $this->type = OccluderType::from($binaryStream->readUInt32());
        $this->origin = $binaryStream->readVector3();
        $this->normal = $binaryStream->readVector3();
        $this->xAxis = $binaryStream->readVector3();
        $this->yAxis = $binaryStream->readVector3();
        $this->pairOffset = $binaryStream->readFloat();
    }
    
}

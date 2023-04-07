<?php

namespace Data\IO\BuyBuild\Lights;

use Core\LinkedResource;
use Data\IO\Core\VersionResource;
use Util\BinaryStream\BinaryStream;

class LightResource extends LinkedResource {

    use VersionResource;

    public static int $type = 62178845;
    private array $lights = [];
    private array $occluders = [];

    public static string $tag = 'LITE';

    public function readData(string | BinaryStream $data) {

        $binaryStream = new BinaryStream($data);
        $this->readTag($binaryStream);
        $this->version = $binaryStream->readUInt32();
        $this->checkVersion(8, 6);
        
        $num1 = $binaryStream->readUInt32();
        $num2 = $binaryStream->readByte();
        $num3 = $binaryStream->readByte();

        if ($num1 != (4 + ($num2 * 128 + $num3 * 14))) {
            throw new \InvalidArgumentException('Light resource has bad light counts');
        }

        if ($binaryStream->readUInt16() != $num3 * 14) {
            throw new \InvalidArgumentException('Light resource has bad occluder counts');
        }

        $this->lights = [];

        for ($index1 = 0; $index1 < $num2; $index1++) {
            $position = $binaryStream->getPosition();
            $light = Light::createLight($binaryStream->readInt32());
            $light->read($binaryStream);

            $count = $position + 128 - $binaryStream->getPosition();
            $numArray = $binaryStream->readBytes($count);

            for ($index2 = 0; $index2 < $count; $index2++) {
                if ($numArray[$index2] != 0) {
                    throw new \InvalidArgumentException('Light resource has data in padding bytes');
                }
            }

            $this->lights[] = $light;

        }

        $this->occluders = [];

        for ($index = 0; $index < $num3; $index++) {
            $occluder = new Occluder();
            $occluder->read($binaryStream);
            $this->occluders[] = $occluder;
        }

    }

    public function writeData(BinaryStream $binaryStream) {

        //TODO Need to implement in future

    }

}
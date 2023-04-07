<?php

namespace Data\IO\BuyBuild\Lights;

use Spatie\Color\Rgba;
use Util\BinaryStream\BinaryStream;
use Util\Geometry\Vector3;

abstract class Light {

    private Vector3 $transform;
    private Rgba $color;
    private float $intensity;

    public function __construct() {
        $this->transform = new Vector3();
    }

    public function read(BinaryStream $binaryStream): void {
        $this->transform = $binaryStream->readVector3();
        $this->color = $binaryStream->readColorSc();
        $this->intensity = $binaryStream->readFloat();
    }

    public static function createLight(int $type): SquareWindowLight|PointLight|DirectionalLight|SquareAreaLight|TubeLight|CircularWindowLight|SpotLight|LampShadeLight|DiscAreaLight|WorldLight|AmbientLight {

        return match ($type) {
            AmbientLight::$lightType => new AmbientLight(),
            DirectionalLight::$lightType => new DirectionalLight(),
            PointLight::$lightType => new PointLight(),
            SpotLight::$lightType => new SpotLight(),
            LampShadeLight::$lightType => new LampShadeLight(),
            TubeLight::$lightType => new TubeLight(),
            SquareWindowLight::$lightType => new SquareWindowLight(),
            CircularWindowLight::$lightType => new CircularWindowLight(),
            SquareAreaLight::$lightType => new SquareAreaLight(),
            DiscAreaLight::$lightType => new DiscAreaLight(),
            WorldLight::$lightType => new WorldLight(),
        };

    }

}
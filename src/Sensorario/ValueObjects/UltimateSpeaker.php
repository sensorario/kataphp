<?php
namespace Sensorario\ValueObjects;

final class UltimateSpeaker
    extends SensorarioValueObject
{
    public function mandatoryAttributes()
    {
        return [
            'name',
            'surname'
        ];
    }

    public function withName($name)
    {
        return new self(array_merge(
            $this->params,
            ['name' => $name]
        ));
    }

    public function name()
    {
        return $this->params['name'];
    }
}


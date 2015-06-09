<?php
namespace Sensorario\ValueObjects;

use SimpleXmlElement;

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

    public function surname()
    {
        return $this->params['surname'];
    }

    public function name()
    {
        return $this->params['name'];
    }

    public function xmlSerialize()
    {
        return (new SimpleXmlElement('<?xml version="1.0" ?><root />'))
            ->addChild('name',    $this->name())
            ->addChild('surname', $this->surname());
    }
}

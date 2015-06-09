<?php
namespace Sensorario\ValueObjects;

final class SensorarioFullName
    extends SensorarioValueObject
{
    public function mandatoryAttributes()
    {
        return [
            'name',
            'surname'
        ];
    }

    public function withNameSurname(array $params)
    {
        return new self([
            'name'    => $params['name'],
            'surname' => $params['surname'],
        ]);
    }

    public function surname()
    {
        return $this->params['surname'];
    }

    public function name()
    {
        return $this->params['name'];
    }
}

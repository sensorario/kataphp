<?php
namespace Sensorario\ValueObjects;

use RuntimeException;

abstract class SensorarioValueObject
{
    protected $params;

    /** @return array */
    abstract public function mandatoryAttributes();

    protected function __construct(array $params = [])
    {
        foreach ($this->mandatoryAttributes() as $validKey) {
            if (!array_key_exists($validKey, $params)) {
                throw new RuntimeException(
                    'This Value Objects has mandatory attributes: '
                    . var_export($this->mandatoryAttributes(), true)
                );
            }

            $this->params[$validKey] = $params[$validKey];
        }
    }

    public static function box(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (!array_key_exists($key, array_flip(static::mandatoryAttributes()))) {
                throw new RuntimeException(
                    'Attribute ' . $key . ' is not valid for this Vale Object.'
                    . var_export(static::mandatoryAttributes(), true)
                );
            }
        }

        return new static($params);
    }
}


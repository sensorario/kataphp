<?php

namespace Patterns\Factory\Interfaces;

interface FactoryKindBuilder
{
    const DOG = 'dog';

    const HORSE = 'horse';

    const BARK = 'bark';

    const SOME_VERSE = 'nitrisce';

    const PATTERNS_FACTORY_KIDS_DOG = 'Patterns\Factory\Kids\Dog';

    const PATTERNS_FACTORY_KIDS_HORSE = 'Patterns\Factory\Kids\Horse';

    public static function build($animal);
}

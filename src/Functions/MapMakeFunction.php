<?php

namespace app\Functions;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class MapMakeFunction implements EvalableInterface, IdenticalInterface
{
    private const NAME = 'bk.action.map.Make';

    public static function equals(string $string): bool
    {
        return $string === self::NAME;
    }

    public function __invoke(...$args): array
    {
        return array_combine($args[0], $args[1]);
    }
}
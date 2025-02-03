<?php

namespace app\Functions;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class ArrayMakeFunction implements EvalableInterface, IdenticalInterface
{
    private const NAME = 'bk.action.array.Make';

    public static function equals(string $string): bool
    {
        return $string === self::NAME;
    }

    public function __invoke(...$args): array
    {
        return $args;
    }
}
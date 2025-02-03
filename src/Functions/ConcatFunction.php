<?php

namespace app\Functions;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class ConcatFunction implements EvalableInterface, IdenticalInterface
{
    private const NAME = 'bk.action.string.Concat';

    public static function equals(string $string): bool
    {
        return $string === self::NAME;
    }

    public function __invoke(...$args): string
    {
        return implode('', $args);
    }
}
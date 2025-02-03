<?php

namespace app\Constants;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class NullConstant implements EvalableInterface, IdenticalInterface
{
    private const VALUE = 'null';

    public static function equals(string $string): bool
    {
        return $string === self::VALUE;
    }

    public function __invoke(...$args): string
    {
        return self::VALUE;
    }
}
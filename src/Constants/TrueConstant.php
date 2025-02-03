<?php

namespace app\Constants;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class TrueConstant implements EvalableInterface, IdenticalInterface
{
    private const VALUE = 'true';

    public static function equals(string $string): bool
    {
        return $string === self::VALUE;
    }

    public function __invoke(...$args): string
    {
        return self::VALUE;
    }
}
<?php

namespace app\Constants;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class FalseConstant implements EvalableInterface, IdenticalInterface
{
    private const VALUE = 'false';

    public static function equals(string $string): bool
    {
        return $string === self::VALUE;
    }

    public function __invoke(...$args): string
    {
        return self::VALUE;
    }
}
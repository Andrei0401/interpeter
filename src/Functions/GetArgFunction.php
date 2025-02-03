<?php

namespace app\Functions;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class GetArgFunction implements EvalableInterface, IdenticalInterface
{
    private const NAME = 'bk.action.core.GetArg';

    public static function equals(string $string): bool
    {
        return $string === self::NAME;
    }

    public function __invoke(...$args): string
    {
        return $_SERVER['argv'][$args[0]] ?? '';
    }
}
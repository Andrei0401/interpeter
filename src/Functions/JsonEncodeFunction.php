<?php

namespace app\Functions;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class JsonEncodeFunction implements EvalableInterface, IdenticalInterface
{
    private const NAME = 'bk.action.string.JsonEncode';

    public static function equals(string $string): bool
    {
        return $string === self::NAME;
    }

    public function __invoke(...$args): string
    {
        return \json_encode($args);
    }
}
<?php

namespace app\Constants;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;

final class IntConstant implements EvalableInterface, IdenticalInterface
{
    public function __construct(
        private string $value
    )
    {
    }

    public static function equals(string $string): bool
    {
        return is_integer($string);
    }

    public function __invoke(...$args): string
    {
        return $this->value;
    }
}
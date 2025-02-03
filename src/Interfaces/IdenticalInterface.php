<?php

namespace app\Interfaces;

interface IdenticalInterface
{
    public static function equals(string $string): bool;
}
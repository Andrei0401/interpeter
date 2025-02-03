<?php

namespace app\Interfaces;

interface EvalableInterface
{
    public function __invoke(...$args): mixed;
}
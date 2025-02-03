<?php

namespace app\Interfaces;

interface InterpreterInterface
{
    public function registerFunction(EvalableInterface&IdenticalInterface $evalable): void;
    public function registerConstant(EvalableInterface&IdenticalInterface $evalable): void;
    public function interpreter(string $input): string;
}
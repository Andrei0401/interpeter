<?php

namespace app;

use app\Interfaces\EvalableInterface;
use app\Interfaces\IdenticalInterface;
use app\Interfaces\InterpreterInterface;

final class Interpreter implements InterpreterInterface
{
    public function __construct(
        private array $availableFunctions = [],
        private array $availableConstants = [],
    )
    {
    }

    public function registerFunction(EvalableInterface&IdenticalInterface $evalable): void
    {
        if (\in_array($evalable::class, $this->availableFunctions, true)) {
            throw new \InvalidArgumentException("Function " . $evalable::class . " is already registered");
        }

        $this->availableFunctions[] = $evalable::class;
    }

    public function registerConstant(EvalableInterface&IdenticalInterface $evalable): void
    {
        if (\in_array($evalable::class, $this->availableConstants, true)) {
            throw new \InvalidArgumentException("Constant " . $evalable::class ." is already registered");
        }

        $this->availableConstants[] = $evalable::class;
    }

    public function interpreter(string $input): string
    {
        $result = '';
        $stack  = $this->getStack(trim($input));

        /** @var string $string */
        foreach ($stack as $string) {
            $result .= $string;
        }

        return $result;
    }

    private function getStack(string $input, array &$stack = []): array
    {
        if (preg_match("/^\((.+?)(,(.*))*?\)$/im", $input, $matches)) {
            $foundFunction = false;
            foreach ($this->availableFunctions as $function) {
                if ($function::equals($matches[1])) {
                    $paramsStrings = preg_split("/\),\(/", $matches[3], -1, PREG_SPLIT_NO_EMPTY);
                    $params        = array_map(function ($param) use ($matches, $stack) {
                        if ($param !== $matches[3]) {
                            $param = '(' . trim($param, ')(') . ")";
                        }
                        return $this->getStack($param, $stack);
                    }, $paramsStrings);

                    $stack[]       = (new $function())(...$params);
                    $foundFunction = true;
                    break;
                }
            }
            if (!$foundFunction) {
                throw new \InvalidArgumentException('Unknown function: ' . $matches[1]);
            }
        } else {
            $foundConstant = false;
            foreach ($this->availableConstants as $constant) {
                if ($constant::equals($input)) {
                    $stack[]       = (new $constant($input))();
                    $foundConstant = true;
                    break;
                }
            }
            if (!$foundConstant) {
                throw new \InvalidArgumentException('Unknown constant: ' . $input);
            }
        }

        return $stack;
    }
}
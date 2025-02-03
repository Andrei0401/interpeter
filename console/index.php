<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Interpreter;
use app\Constants;
use app\Functions;

$interpreter = new Interpreter();

$interpreter->registerConstant(new Constants\TrueConstant());
$interpreter->registerConstant(new Constants\FalseConstant());
$interpreter->registerConstant(new Constants\NullConstant());
$interpreter->registerConstant(new Constants\IntConstant("0"));
$interpreter->registerConstant(new Constants\FloatConstant("0.0"));
$interpreter->registerConstant(new Constants\StringConstant(""));

$interpreter->registerFunction(new Functions\JsonEncodeFunction());
$interpreter->registerFunction(new Functions\MapMakeFunction());
$interpreter->registerFunction(new Functions\ConcatFunction());
$interpreter->registerFunction(new Functions\GetArgFunction());
$interpreter->registerFunction(new Functions\ArrayMakeFunction());

$program = "(bk.action.string.JsonEncode,(bk.action.map.Make,(bk.action.array.Make,\"message\"),(bk.action.array.Make,(bk.action.string.Concat,\"Hello, \",(bk.action.core.GetArg,0)))))";

$result = $interpreter->interpreter($program);

echo $result;
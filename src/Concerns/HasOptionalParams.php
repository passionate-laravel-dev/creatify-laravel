<?php

namespace Passionatelaraveldev\CreatifyLaravel\Concerns;

use ReflectionMethod;

trait HasOptionalParams
{
    /**
     * get filled args, we can use this function when we have a lot of optional parameters on function
     *
     * @param callable|string  $function
     * @param array $args
     */
    protected function getFuncArgs($function, array $args): array
    {
        $reflectionFunc = new ReflectionMethod($this, $function);
        $parameters = $reflectionFunc->getParameters();

        $filledParams = [];

        foreach ($parameters as $index => $param) {
            if (isset($args[$index]) && ($args[$index] != null && $args[$index] != '')) {
                $paramName = $param->getName();
                $filledParams[$paramName] = $args[$index];
            }
        }

        return $filledParams;
    }
}

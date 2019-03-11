<?php
/**
 * Copyright 2017 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Exceptions;

class TransparentException extends \Exception
{
    public static function buildWithException(\Throwable $e): self
    {
        $exception = new static($e->getMessage(), $e->getCode(), $e);
        return $exception;
    }
}

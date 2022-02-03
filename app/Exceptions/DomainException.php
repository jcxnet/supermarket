<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class DomainException extends Exception
{
    public function __construct()
    {
        parent::__construct($this->errorMessage(), $this->errorCode());
    }

    abstract public function errorCode(): int;

    abstract protected function errorMessage(): string;

    public function render(): JsonResponse
    {
        return response()->json(['code' => $this->errorCode(), 'message' => $this->errorMessage()], $this->errorCode());
    }
}

<?php

declare(strict_types=1);

namespace App\Domains\Store\Exceptions;

use App\Exceptions\DomainException;

class StoreNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Store not found';
    }
}

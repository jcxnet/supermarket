<?php

declare(strict_types=1);

namespace App\Domains\Customer\Exceptions;

use App\Exceptions\DomainException;

class CustomerNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Customer not found';
    }
}

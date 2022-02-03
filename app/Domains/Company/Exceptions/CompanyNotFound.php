<?php

declare(strict_types=1);

namespace App\Domains\Company\Exceptions;

use App\Exceptions\DomainException;

class CompanyNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Company not found';
    }
}

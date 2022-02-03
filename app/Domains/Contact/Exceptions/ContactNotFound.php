<?php

declare(strict_types=1);

namespace App\Domains\Contact\Exceptions;

use App\Exceptions\DomainException;

class ContactNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Contact not found';
    }
}

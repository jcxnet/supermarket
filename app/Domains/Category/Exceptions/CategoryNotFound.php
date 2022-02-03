<?php

declare(strict_types=1);

namespace App\Domains\Category\Exceptions;

use App\Exceptions\DomainException;

class CategoryNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Category not found';
    }
}

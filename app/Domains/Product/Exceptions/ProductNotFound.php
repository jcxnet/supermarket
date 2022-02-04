<?php

declare(strict_types=1);

namespace App\Domains\Product\Exceptions;

use App\Exceptions\DomainException;

class ProductNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Product not found';
    }
}

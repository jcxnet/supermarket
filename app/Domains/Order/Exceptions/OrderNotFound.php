<?php

declare(strict_types=1);

namespace App\Domains\Order\Exceptions;

use App\Exceptions\DomainException;

class OrderNotFound extends DomainException
{

    public function errorCode(): int
    {
        return 404;
    }

    protected function errorMessage(): string
    {
        return 'Order not found';
    }
}

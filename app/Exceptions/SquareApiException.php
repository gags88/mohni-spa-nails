<?php

namespace App\Exceptions;

use RuntimeException;

class SquareApiException extends RuntimeException
{
    /** @var int|null */
    protected $statusCode;

    /** @var array */
    protected $errors;

    public function __construct(string $message, ?int $statusCode = null, array $errors = [])
    {
        parent::__construct($message);

        $this->statusCode = $statusCode;
        $this->errors = $errors;
    }

    public function statusCode(): ?int
    {
        return $this->statusCode;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}

<?php

namespace Stack;

use Throwable;

class StackEmptyException extends \UnderflowException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?? 'Stack is empty!', $code, $previous);
    }
}

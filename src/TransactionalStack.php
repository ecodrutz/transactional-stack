<?php

namespace Stack;

class TransactionalStack extends Stack implements TransactionableInterface
{
    /**
     * @var array
     */
    protected $snapShots = [];

    public function start(): void
    {
        $this->snapShots[] = $this->top;
    }

    /**
     * @return bool
     */
    public function rollback(): bool
    {
        if (count($this->snapShots) < 1) {
            return false;
        }

        $this->top = array_pop($this->snapShots);

        return true;
    }

    /**
     * @return bool
     */
    public function commit(): bool
    {
        if (count($this->snapShots) < 1) {
            return false;
        }

        array_pop($this->snapShots);

        return true;
    }
}

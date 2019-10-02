<?php

namespace Stack;

interface StackInterface
{
    /**
     * Pushes a value on top of the stack
     *
     * @param mixed $value
     */
    public function push($value): void;

    /**
     * Removes the top-most value from the stack and returns it.
     *
     * @return mixed
     */
    public function pop();

    /**
     * Returns the top-most value from the stack.
     *
     * @return mixed
     */
    public function peek();
}

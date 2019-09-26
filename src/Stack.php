<?php

namespace Stack;

class Stack implements StackInterface
{
    /**
     * @var Node|null;
     */
    protected $top;

    /**
     * @param mixed $value
     */
    public function push($value): void
    {
        $this->top = new Node($value, $this->top);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        if (is_null($this->top)) {
            throw new StackEmptyException();
        }
        $node = $this->top;
        $this->top = $node->getNext();

        return $node->getValue();
    }

    /**
     * @return mixed
     */
    public function peek()
    {
        if (is_null($this->top)) {
            throw new StackEmptyException();
        }

        return $this->top->getValue();
    }
}

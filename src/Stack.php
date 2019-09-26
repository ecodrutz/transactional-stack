<?php

namespace Stack;

class Stack implements StackInterface
{
    /**
     * @var Node|null;
     */
    protected $top;

    public function push($value): void
    {
        $this->top = new Node($value, $this->top);
    }

    public function pop()
    {
        if (is_null($this->top)) {
            throw new StackEmptyException();
        }
        $node = $this->top;
        $this->top = $node->getNext();

        return $node->getValue();
    }

    public function peek()
    {
        if (is_null($this->top)) {
            throw new StackEmptyException();
        }

        return $this->top->getValue();
    }
}

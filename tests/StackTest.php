<?php

namespace Stack\Tests;

use Stack\Stack;
use Stack\StackEmptyException;

class StackTest extends BaseTest
{
    public function testBasicFlowIntegers()
    {
        $stack = new Stack();
        $this->assertNull($stack->push(1));
        $this->assertEquals(1, $stack->pop());
        $this->assertNull($stack->push(2));
        $this->assertEquals(2, $stack->peek());
        $this->assertNull($stack->push(3));
        $this->assertEquals(3, $stack->peek());
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals(2, $stack->pop());
    }

    public function testBasicFlowString()
    {
        $stack = new Stack();
        $this->assertNull($stack->push('a'));
        $this->assertEquals('a', $stack->pop());
        $this->assertNull($stack->push('b'));
        $this->assertEquals('b', $stack->peek());
        $this->assertNull($stack->push('c'));
        $this->assertEquals('c', $stack->peek());
        $this->assertEquals('c', $stack->pop());
        $this->assertEquals('b', $stack->pop());
    }

    public function testBasicFlowRandom()
    {
        $stack = new Stack();
        $this->assertNull($stack->push('a'));
        $this->assertEquals('a', $stack->pop());
        $this->assertNull($stack->push(2));
        $this->assertEquals(2, $stack->peek());
        $this->assertNull($stack->push(new \StdClass()));
        $this->assertEquals(new \StdClass(), $stack->peek());
        $this->assertEquals(new \StdClass(), $stack->pop());
        $this->assertEquals(2, $stack->pop());
    }

    public function testPopException()
    {
        $stack = new Stack();
        $this->expectException(StackEmptyException::class);
        $stack->pop();
    }

    public function testPeekException()
    {
        $stack = new Stack();
        $this->expectException(StackEmptyException::class);
        $stack->peek();
    }
}
